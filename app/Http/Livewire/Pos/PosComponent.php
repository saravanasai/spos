<?php

namespace App\Http\Livewire\Pos;

use App\Models\Order\Orders;
use App\Models\OrderItems\OrderItems;
use App\Models\Products\Products;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PosComponent extends Component
{

    use WithPagination;

    public $search;
    public $billNo;
    public $currentBillProducts;

    public $amountPaid;
    public $totalAmount;

    protected $queryString = ['search'];



    public function mount()
    {
        $this->billNo = $this->getOrderNo();
        $this->totalAmount = $this->totalBillAmount();
        $this->currentBillProducts = $this->getCurrentBillProducts();
    }

    public function totalBillAmount()
    {
        return OrderItems::where('order_id', $this->billNo)->sum(DB::raw('order_product_quantity * total'));
    }

    public function getOrderNo()
    {
        $billNo = Orders::where('order_status', auth('employee')->user()->id)->first();
        if ($billNo == null) {

            $billNo = Orders::create(['order_status' => auth('employee')->user()->id]);
        }

        return $billNo->id;
    }

    public function addProductToCurrentBill($productId)
    {
        $productExist = OrderItems::where('product_id', $productId)
            ->where('order_id', $this->billNo)->first();
        $product = Products::find($productId);
        if ($productExist == null) {


            OrderItems::create([
                "order_id" => $this->billNo,
                "product_id" => $product->id,
                "order_product_quantity" => 1,
                "total" => $product->product_price,
            ]);

            Products::find($product->id)->decrement('product_quantity', 1);
        } else {

            $productExist->increment('order_product_quantity', 1);
            Products::find($product->id)->decrement('product_quantity', 1);
        }

        $this->search = '';
        $this->currentBillProducts = $this->getCurrentBillProducts();
        $this->totalAmount = $this->totalBillAmount();
    }

    public function increaseQuantity($id, $productId)
    {
        OrderItems::find($id)->increment('order_product_quantity', 1);
        Products::find($productId)->decrement('product_quantity', 1);
        $this->currentBillProducts = $this->getCurrentBillProducts();
        $this->totalAmount = $this->totalBillAmount();
    }

    public function decreaseQuantity($id, $productId)
    {
        OrderItems::find($id)->decrement('order_product_quantity', 1);
        Products::find($productId)->increment('product_quantity', 1);
        $this->currentBillProducts = $this->getCurrentBillProducts();
        $this->totalAmount = $this->totalBillAmount();
    }

    public function deleteOrderItems($id, $productId)
    {
        $item = OrderItems::find($id);
        Products::find($productId)->increment('product_quantity', $item->order_product_quantity);
        $item->delete();
        $this->currentBillProducts = $this->getCurrentBillProducts();
        $this->totalAmount = $this->totalBillAmount();
    }

    public function pay()
    {

        Orders::find($this->billNo)->update([
            "order_sum" => $this->totalAmount,
            "amount_paid" => $this->amountPaid,
            "branch_id" => auth('employee')->user()->branch_id,
            "order_status" => 0
        ]);

        $this->billNo = null;
        $this->amountPaid = '';
        $this->currentBillProducts = $this->getCurrentBillProducts();
        $this->totalAmount = $this->totalBillAmount();
        $this->billNo = $this->getOrderNo();
    }

    public function getCurrentBillProducts()
    {
        return OrderItems::with('Product')->where('order_id', $this->billNo)->get();
    }



    public function render()
    {

        $query = Products::query();

        $query->where('product_of_branch', auth('employee')->user()->branch_id);

        if ($this->search) {
            $query->where('product_name', 'LIKE', "%{$this->search}%")
                ->orWhere('product_code', 'LIKE', "%{$this->search}%");
        }

        return view('livewire.pos.pos-component', ['products' => $query->paginate(5)]);
    }
}
