<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Accordion extends Component
{
    public string $id;
    public bool $flush;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $id = null,
        bool $flush = false
    ) {
        $this->id = $id ?? 'accordion-' . uniqid();
        $this->flush = $flush;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::accordion.index');
    }
}
