<?php

namespace App\Http\Livewire\Setting;

use App\Models\Employee\Employee;
use App\Models\Role\Role;
use Illuminate\Support\Facades\Hash;
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

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        $this->roles = Role::all();
        $this->branch = auth('web')->user()->current_branch ;
    }


    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function toggleActiveStatus($id)
    {
        $employee=Employee::find($id);
        $employee->update([
            "active_status"=>$employee->active_status ? 0 : 1
        ]);

        $this->emit('refreshComponent');
    }

    public function addEmployee()
    {

        $this->validate();

        Employee::create([
            "name"=>$this->name,
            "email"=>$this->email,
            "phone"=>$this->phone,
            "password"=>Hash::make($this->password),
            "branch_id"=>auth('web')->user()->current_branch,
            "role_id"=>$this->role,
        ]);

        session()->flash('employee-added','Employee Registered');

        $this->reset([
            'name',
            'email',
            'phone',
            'password',
            'role',
        ]);

        $this->emit('alert_remove');

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
