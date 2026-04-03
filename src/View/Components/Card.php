<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public ?string $title;
    public ?string $status;
    public bool $stacked;
    public bool $sm;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $title = null,
        ?string $status = null,
        bool $stacked = false,
        bool $sm = false
    ) {
        $this->title = $title;
        $this->status = $status;
        $this->stacked = $stacked;
        $this->sm = $sm;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::card.index');
    }
}
