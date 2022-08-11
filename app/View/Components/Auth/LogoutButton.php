<?php

namespace App\View\Components\Auth;

use Illuminate\View\Component;

class LogoutButton extends Component
{


    public $params;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($params)
    {
        $this->params=$params;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.auth.logout-button');
    }
}
