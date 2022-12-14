<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginFormComponent extends Component
{

    public string $email;

    public string $password;


    protected $rules=[
        'email'=>'required|email',
        'password'=>'required|digits:5',
    ];


    public function login(){


        $this->validate();

        //authentication process
        if(Auth::attempt(['email'=>$this->email,'password'=>$this->password]))
        {
            return redirect()->route('dashboard');
        }

        session()->flash('login-failed', 'Invalid Credentials');
    }


    public function updated($propertyName){

        $this->validateOnly($propertyName);

    }

    public function mount(){

        $this->fill([
            "email"=>"admin@gmail.com",
            "password"=>"12345",
        ]);
    }


    public function render(){

        return view('livewire.auth.login-form-component');
    }
}
