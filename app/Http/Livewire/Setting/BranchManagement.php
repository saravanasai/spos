<?php

namespace App\Http\Livewire\Setting;

use App\Models\Branch\Branch;
use Livewire\Component;

class BranchManagement extends Component
{

    public $branchName;
    public $branchCode;


    protected $rules = [
        'branchName' => 'required',
        'branchCode' => 'required',
    ];

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function destroy($id)
    {
        Branch::destroy($id);

        $this->emit('refreshComponent');
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function addBranch()
    {
        $this->validate();

        Branch::create([
            'branch' => $this->branchName,
            'branch_code' => $this->branchCode,
        ]);

        session()->flash('branch-added', 'New Branch Added');

        $this->reset([
            'branchName',
            'branchCode'
        ]);

        $this->emit('alert_remove');

    }

    public function render()
    {
        return view('livewire.setting.branch-management',[
            'branches' => Branch::paginate(5)
        ]);
    }
}
