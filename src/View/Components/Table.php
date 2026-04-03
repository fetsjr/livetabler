<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public bool $striped;
    public bool $hover;
    public bool $card;
    public bool $responsive;

    /**
     * Create a new component instance.
     */
    public function __construct(
        bool $striped = false,
        bool $hover = true,
        bool $card = false,
        bool $responsive = true
    ) {
        $this->striped = $striped;
        $this->hover = $hover;
        $this->card = $card;
        $this->responsive = $responsive;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::table.index');
    }
}
