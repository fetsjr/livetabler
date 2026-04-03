<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Avatar extends Component
{
    public string $size;
    public string $shape;
    public ?string $src;
    public ?string $initials;
    public ?string $status;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $size = 'md',
        string $shape = 'rounded',
        ?string $src = null,
        ?string $initials = null,
        ?string $status = null
    ) {
        $this->size = $size;
        $this->shape = $shape;
        $this->src = $src;
        $this->initials = $initials;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::avatar.index');
    }
}
