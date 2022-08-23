<?php

namespace App\Http\Livewire\Components\Modal;

use Livewire\Component;

class ModalComponent extends Component
{


    public $show = false;

    protected $listeners = [
      'show' => 'show',
      'close' => 'close',
    ];

    public function show($id)
    {

      $this->show = true;
    }

    public function close()
    {

      $this->show = false;
    }



}
