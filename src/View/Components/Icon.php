<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Icon extends Component
{
    public string $name;
    public string $class;
    public string $size;
    public string $stroke;

    /**
     * Create a new component instance.
     *
     * @param string $name Name of the Tabler icon (without 'ti ti-').
     * @param string $class Additional CSS classes.
     * @param string $size Icon size in pixels.
     * @param string $stroke Stroke width.
     */
    public function __construct(string $name, string $class = '', string $size = '24', string $stroke = '2')
    {
        $this->name = $name;
        $this->class = $class;
        $this->size = $size;
        $this->stroke = $stroke;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::icon.index');
    }
}
