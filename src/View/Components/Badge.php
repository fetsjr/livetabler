<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Badge extends Component
{
    public string $variant;
    public bool $outline;
    public bool $pill;
    public bool $dot;
    public ?string $label;
    public ?string $icon;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $variant = 'primary',
        bool $outline = false,
        bool $pill = false,
        bool $dot = false,
        ?string $label = null,
        ?string $icon = null
    ) {
        $this->variant = $variant;
        $this->outline = $outline;
        $this->pill = $pill;
        $this->dot = $dot;
        $this->label = $label;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::badge.index');
    }
}
