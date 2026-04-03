<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public string $id;
    public string $title;
    public string $size;
    public ?string $status;
    public bool $scrollable;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $id,
        string $title = '',
        string $size = 'md',
        ?string $status = null,
        bool $scrollable = false
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->size = $size;
        $this->status = $status;
        $this->scrollable = $scrollable;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::modal.index');
    }
}
