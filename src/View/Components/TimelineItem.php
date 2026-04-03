<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class TimelineItem extends Component
{
    public string $title;
    public string $time;
    public ?string $icon;
    public string $color;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $title,
        string $time = '',
        ?string $icon = 'circle',
        string $color = 'primary'
    ) {
        $this->title = $title;
        $this->time = $time;
        $this->icon = $icon;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::timeline.item');
    }
}
