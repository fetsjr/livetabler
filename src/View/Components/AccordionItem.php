<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class AccordionItem extends Component
{
    public string $title;
    public ?string $icon;
    public bool $active;
    public string $itemId;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $title,
        ?string $icon = null,
        bool $active = false
    ) {
        $this->title = $title;
        $this->icon = $icon;
        $this->active = $active;
        $this->itemId = 'accordion-item-' . uniqid();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::accordion.item');
    }
}
