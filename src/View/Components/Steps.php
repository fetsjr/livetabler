<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Steps extends Component
{
    public bool $counter;

    /**
     * Create a new component instance.
     */
    public function __construct(
        bool $counter = false
    ) {
        $this->counter = $counter;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::steps.index');
    }
}
