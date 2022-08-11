<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EmpLoginFormComponent extends Component
{

    public string $email;

    public string $password;


    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|digits:5',
    ];


    public function login()
    {
        $this->validate();
        //authentication process
        if (Auth::guard('employee')->attempt(['email' => $this->email, 'password' => $this->password])) {

            return redirect()->route('dashboard');
        }

        session()->flash('login-failed', 'Invalid Credentials');
    }


    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);
    }

    public function mount()
    {
    }

    public function fillAsManager()
    {
        $this->fill([
            "email" => "manager1@spos.com",
            "password" => "12345",
        ]);
    }

    public function fillAsCashier()
    {
        $this->fill([
            "email" => "cahsier1@spos.com",
            "password" => "12345",
        ]);
    }

    public function fillAsBiller()
    {
        $this->fill([
            "email" => "biller@spos.com",
            "password" => "12345",
        ]);
    }

    public function render()
    {
        return view('livewire.auth.emp-login-form-component');
    }
}
