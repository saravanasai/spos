<?php

namespace App\Http\Livewire\Setting;

use App\Models\Branch\Branch;
use App\Models\User;
use Livewire\Component;

class BranchSwitchComponent extends Component
{

    public $branches;
    public $changeBranchId;

    public $disabled=true;

    public function mount()
    {
        $this->branches = Branch::all();
        $this->changeBranchId = auth('web')->user()->current_branch;
    }

    public function toggleBranchChange()
    {
            $this->disabled=false;
    }

    public function handleBranchChange()
    {
        User::find(auth('web')->user()->id)->update([
            'current_branch' => $this->changeBranchId
        ]);
        $this->disabled=true;
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.setting.branch-switch-component');
    }
}
