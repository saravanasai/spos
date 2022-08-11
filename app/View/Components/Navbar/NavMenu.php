<?php

namespace App\View\Components\Navbar;

use Illuminate\View\Component;

class NavMenu extends Component
{

    public $route;
    public $menuText;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route,$menuText)
    {
        $this->route=$route;
        $this->menuText=$menuText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar.nav-menu');
    }
}
