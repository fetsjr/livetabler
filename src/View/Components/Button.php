<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public string $as;
    public string $variant;
    public string $size;
    public ?string $icon;
    public ?string $iconTrailing;
    public bool $loading;
    public bool $pill;
    public bool $square;
    public ?string $href;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $as = 'button',
        string $variant = 'primary',
        string $size = 'md',
        ?string $icon = null,
        ?string $iconTrailing = null,
        bool $loading = false,
        bool $pill = false,
        bool $square = false,
        ?string $href = null
    ) {
        $this->as = $as;
        $this->variant = $variant;
        $this->size = $size;
        $this->icon = $icon;
        $this->iconTrailing = $iconTrailing;
        $this->loading = $loading;
        $this->pill = $pill;
        $this->square = $square;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::button.index');
    }
}
