<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public array $items;

    /**
     * Create a new component instance.
     * 
     * @param array $items Array of items ['label' => 'url', 'active' => true]
     */
    public function __construct(
        array $items = []
    ) {
        $this->items = $items;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::breadcrumb.index');
    }
}
