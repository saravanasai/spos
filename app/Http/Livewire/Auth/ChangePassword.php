<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{

    public $newPassword;
    public $confrimPassword;
    public $disabled = true;


    protected $rules = [
        'newPassword' => 'required|digits:5',
        'confrimPassword' => 'required|same:newPassword|digits:5',
    ];


    public function updated($property)
    {

        $this->validateOnly($property);

        if ($this->validate()) {
            $this->disabled = false;
        } else {
            $this->disabled = true;
        }
    }


    public function changePassword()
    {

        User::find(auth()->user()->id)->update([
            "password" => Hash::make($this->newPassword)
        ]);

        $this->newPassword = "";
        $this->confrimPassword = "";

        session()->flash('password-changed', 'Password Changed Successfully');
    }

    public function render()
    {
        return view('livewire.auth.change-password');
    }
}
