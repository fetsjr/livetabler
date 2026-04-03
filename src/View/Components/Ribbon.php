<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Ribbon extends Component
{
    public string $position;
    public string $color;
    public bool $bookmark;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $position = 'top',
        string $color = 'primary',
        bool $bookmark = false
    ) {
        $this->position = $position;
        $this->color = $color;
        $this->bookmark = $bookmark;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::ribbon.index');
    }
}
