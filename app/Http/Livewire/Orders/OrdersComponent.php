<?php

namespace App\Http\Livewire\Orders;

use App\Models\Order\Orders;
use App\Models\OrderItems\OrderItems;
use Livewire\Component;
use Livewire\WithPagination;

class OrdersComponent extends Component
{

    use WithPagination;

    public $saleFromDate;
    public $saleToDate;
    public $searchbillNo;

    public $orderItems;


    protected $queryString=['searchbillNo'];

    protected $listeners = ['refreshOrders' => '$refresh'];

    public function mount()
    {
        $this->orderItems=collect();
    }

    public function render()
    {

        $query=Orders::query();

        $query->where('order_status',0);

        return view('livewire.orders.orders-component',[
            'orders'=>$query->orderBy('created_at','DESC')->paginate(10)
        ]);
    }


    public function edit($id)
    {

        $this->emit('show',$id);

    }
}
