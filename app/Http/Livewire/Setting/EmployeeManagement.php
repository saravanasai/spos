<?php

namespace App\Http\Livewire\Setting;

use App\Models\Employee\Employee;
use App\Models\Role\Role;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeManagement extends Component
{

    use WithPagination;

    public $branch;

    public $name;
    public $email;
    public $phone;
    public $password;
    public $role;
    public $roles;

    protected $rules = [
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'password' => 'required',
        'role' => 'required',
    ];
    public function mount()
    {
        $this->roles = Role::all();
        $this->branch = auth('web')->user()->current_branch ;
    }




    public function render()
    {
        return view(
            'livewire.setting.employee-management',
            [
                'employees' => Employee::where('branch_id', $this->branch)->paginate(5)
            ]
        );
    }
}
