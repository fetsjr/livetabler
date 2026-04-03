<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Timeline extends Component
{
    public bool $simple;

    /**
     * Create a new component instance.
     */
    public function __construct(
        bool $simple = false
    ) {
        $this->simple = $simple;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::timeline.index');
    }
}
