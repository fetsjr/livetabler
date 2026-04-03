<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public string $name;
    public string $type;
    public ?string $label;
    public ?string $placeholder;
    public ?string $icon;
    public ?string $description;
    public ?string $error;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $name,
        string $type = 'text',
        ?string $label = null,
        ?string $placeholder = null,
        ?string $icon = null,
        ?string $description = null,
        ?string $error = null
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->icon = $icon;
        $this->description = $description;
        $this->error = $error;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::input.index');
    }
}
