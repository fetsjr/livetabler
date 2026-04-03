<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Autocomplete extends Component
{
    public string $name;
    public ?string $label;
    public ?string $placeholder;
    public ?string $url;
    public array $options;
    public $value;
    public int $minChars;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $name,
        ?string $label = null,
        ?string $placeholder = 'Empiece a escribir para buscar...',
        ?string $url = null,
        array $options = [],
        $value = null,
        int $minChars = 3
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->url = $url;
        $this->options = $options;
        $this->value = $value;
        $this->minChars = $minChars;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::autocomplete.index');
    }
}
