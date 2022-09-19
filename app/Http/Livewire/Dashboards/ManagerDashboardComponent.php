<?php

namespace App\Http\Livewire\Dashboards;

use App\Models\Employee\Employee;
use App\Models\Order\Orders;
use App\Models\Products\Products;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ManagerDashboardComponent extends Component
{

    public int $employeeCount = 0;
    public int $todayTotal = 0;
    public int $totalProducts = 0;
    public int $storeValue = 0;

    public function mount()
    {

        $this->employeeCount = Employee::query()
            ->where('branch_id', auth('employee')->user()->branch_id)
            ->where('id', '!=', auth('employee')->user()->id)
            ->count();

        $this->todayTotal = Orders::query()
            ->where('order_status', 0)
            ->where('branch_id', auth('employee')->user()->branch_id)
            ->whereDate('created_at', Carbon::today())
            ->sum('order_sum');

        $this->totalProducts = Products::query()
            ->where('product_of_branch', auth('employee')->user()->branch_id)
            ->count();

        $this->storeValue = Products::select(DB::raw('product_quantity * product_price as stockValue'))
        ->where('product_of_branch', auth('employee')->user()->branch_id)->first()->stockValue;

    }


    public function render()
    {
        return view('livewire.dashboards.manager-dashboard-component');
    }
}
