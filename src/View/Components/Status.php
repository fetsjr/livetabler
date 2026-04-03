<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Status extends Component
{
    public string $color;
    public bool $animated;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $color = 'primary',
        bool $animated = false
    ) {
        $this->color = $color;
        $this->animated = $animated;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::status.index');
    }
}
