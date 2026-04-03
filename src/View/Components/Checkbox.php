<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Checkbox extends Component
{
    public string $name;
    public ?string $label;
    public ?string $description;
    public bool $checked;
    public bool $switch;
    public string $value;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $name,
        ?string $label = null,
        ?string $description = null,
        bool $checked = false,
        bool $switch = false,
        string $value = '1'
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->description = $description;
        $this->checked = $checked;
        $this->switch = $switch;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::checkbox.index');
    }
}
