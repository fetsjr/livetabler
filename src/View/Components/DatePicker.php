<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class DatePicker extends Component
{
    public string $name;
    public ?string $label;
    public ?string $placeholder;
    public ?string $value;
    public bool $icon;
    public array $options;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $name,
        ?string $label = null,
        ?string $placeholder = 'Seleccione una fecha...',
        ?string $value = null,
        bool $icon = true,
        array $options = []
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->icon = $icon;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::datepicker.index');
    }
}
