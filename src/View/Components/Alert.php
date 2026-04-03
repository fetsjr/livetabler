<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public string $variant;
    public ?string $icon;
    public bool $important;
    public bool $dismissible;
    public ?string $title;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $variant = 'info',
        ?string $icon = null,
        bool $important = false,
        bool $dismissible = false,
        ?string $title = null
    ) {
        $this->variant = $variant;
        $this->icon = $icon;
        $this->important = $important;
        $this->dismissible = $dismissible;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::alert.index');
    }
}
