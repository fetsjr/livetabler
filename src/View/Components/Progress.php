<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Progress extends Component
{
    public int $value;
    public string $variant;
    public string $size;
    public bool $indeterminate;
    public ?string $label;

    /**
     * Create a new component instance.
     */
    public function __construct(
        int $value = 0,
        string $variant = 'primary',
        string $size = 'md',
        bool $indeterminate = false,
        ?string $label = null
    ) {
        $this->value = $value;
        $this->variant = $variant;
        $this->size = $size;
        $this->indeterminate = $indeterminate;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::progress.index');
    }
}
