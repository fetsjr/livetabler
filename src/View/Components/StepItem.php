<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class StepItem extends Component
{
    public bool $active;
    public bool $completed;
    public ?string $title;

    /**
     * Create a new component instance.
     */
    public function __construct(
        bool $active = false,
        bool $completed = false,
        ?string $title = null
    ) {
        $this->active = $active;
        $this->completed = $completed;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::steps.item');
    }
}
