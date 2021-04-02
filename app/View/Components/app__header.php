<?php

namespace App\View\Components;

use Illuminate\View\Component;

class app__header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($username)
    {
        //
        $this->username = $username;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.app__header');
    }
}
