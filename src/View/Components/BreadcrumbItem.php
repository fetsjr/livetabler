<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class BreadcrumbItem extends Component
{
    public ?string $href;
    public bool $active;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $href = null,
        bool $active = false
    ) {
        $this->href = $href;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::breadcrumb.item');
    }
}
