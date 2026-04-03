<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Dropdown extends Component
{
    public string $label;
    public ?string $icon;
    public string $variant;
    public bool $arrow;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $label = 'Actions',
        ?string $icon = null,
        string $variant = 'ghost',
        bool $arrow = true
    ) {
        $this->label = $label;
        $this->icon = $icon;
        $this->variant = $variant;
        $this->arrow = $arrow;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::dropdown.index');
    }
}
