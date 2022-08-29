<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChangeProfilePictureComponent extends Component
{

    use WithFileUploads;

    public $photo;
    public bool $imageUploaded = false;


    protected $rules = [
        'photo' => 'required|image|max:1024', // 1MB Max
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $user = User::find(auth('web')->user()->id);

        $isUploaded=$user->addMedia($this->photo->getRealPath())
        ->usingName($this->photo->getClientOriginalName())
        ->preservingOriginal()
        ->toMediaCollection('profile-images');

        if($isUploaded)
        {
            $this->imageUploaded = true;

            session()->flash('profile-image-changed', 'Profile Image Changed');
        }



    }
    public function render()
    {
        return view('livewire.profile.change-profile-picture-component');
    }
}
