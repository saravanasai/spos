<?php

namespace App\Http\Livewire\Pos;

use App\Models\Order\Orders;
use App\Models\OrderItems\OrderItems;
use App\Models\Products\Products;
use Livewire\Component;
use Livewire\WithPagination;

class PosComponent extends Component
{

    use WithPagination;

    public $search;
    public $billNo;
    public $currentBillProducts;

    protected $queryString = ['search'];



    public function mount()
    {
        $this->billNo = $this->getOrderNo();
        $this->currentBillProducts = $this->getCurrentBillProducts();
    }


    public function getOrderNo()
    {
        $billNo = Orders::where('order_status', auth('employee')->user()->id)->first()->id;
        if ($billNo == null) {

            $billNo = Orders::create(['order_status' => auth('employee')->user()->id])->id;
        }

        return $billNo;
    }

    public function addProductToCurrentBill($productId)
    {

        $product = Products::find($productId);

        OrderItems::create([
            "order_id" => $this->billNo,
            "product_id" => $product->id,
            "order_product_quantity" => 1,
            "total" => $product->product_price,
        ]);
        Products::find($product->id)->decrement('product_quantity', 1);
        $this->search = '';
        $this->currentBillProducts = $this->getCurrentBillProducts();
    }

    public function increaseQuantity($id,$productId)
    {
        OrderItems::find($id)->increment('order_product_quantity', 1);
        Products::find($productId)->decrement('product_quantity', 1);
        $this->currentBillProducts = $this->getCurrentBillProducts();
    }

    public function decreaseQuantity($id,$productId)
    {
        OrderItems::find($id)->decrement('order_product_quantity', 1);
        Products::find($productId)->increment('product_quantity', 1);
        $this->currentBillProducts = $this->getCurrentBillProducts();
    }

    public function deleteOrderItems($id,$productId)
    {
        $item=OrderItems::find($id);
        Products::find($productId)->increment('product_quantity', $item->order_product_quantity);
        $item->delete();
        $this->currentBillProducts = $this->getCurrentBillProducts();
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
