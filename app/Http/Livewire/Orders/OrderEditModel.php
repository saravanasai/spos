<?php

namespace App\Http\Livewire\Orders;

use App\Http\Livewire\Components\Modal\ModalComponent;
use App\Models\Order\Orders;
use App\Models\OrderItems\OrderItems;
use App\Traits\Orders\WithProduct;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrderEditModel extends ModalComponent
{
    use WithProduct;


    public $tittle;

    public $orderItems;
    public $orderId;
    public $totalBillAmount;

    public function show($id)
    {
        $this->orderId = $id;
        $this->orderItems = OrderItems::where('order_id', $id)->get();
        $this->totalBillAmount = $this->totalBillAmount($this->orderId);

        $this->show = true;
    }


    public function mount($tittle)
    {
        $this->tittle = $tittle;
        $this->orderItems = collect();
    }

    public function updateBill($id)
    {

        Orders::find($id)->update([

            "order_sum" => $this->totalBillAmount
        ]);

        $this->emit('refreshOrders');

        $this->emit('close');
    }

    public function render()
    {
        $this->totalBillAmount = $this->totalBillAmount($this->orderId);
        $this->orderItems = OrderItems::where('order_id', $this->orderId)->get();

        return view('livewire.orders.order-edit-model', ['orderNo' => $this->orderId]);
    }
}
