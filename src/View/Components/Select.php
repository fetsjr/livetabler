<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public string $name;
    public ?string $label;
    public ?string $placeholder;
    public bool $multiple;
    public bool $searchable;
    public array $options;
    public $value;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $name,
        ?string $label = null,
        ?string $placeholder = 'Seleccione una opción...',
        bool $multiple = false,
        bool $searchable = false,
        array $options = [],
        $value = null
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->multiple = $multiple;
        $this->searchable = $searchable;
        $this->options = $options;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::select.index');
    }
}
