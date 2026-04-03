<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Navbar extends Component
{
    public bool $sticky;
    public bool $overlap;
    public string $theme;

    /**
     * Create a new component instance.
     */
    public function __construct(
        bool $sticky = false,
        bool $overlap = false,
        string $theme = 'light'
    ) {
        $this->sticky = $sticky;
        $this->overlap = $overlap;
        $this->theme = $theme;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::navbar.index');
    }
}
