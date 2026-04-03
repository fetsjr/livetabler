<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Layout extends Component
{
    public string $type;
    public bool $sticky;
    public bool $overlap;
    public ?string $theme;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $type = 'vertical',
        bool $sticky = false,
        bool $overlap = false,
        ?string $theme = null
    ) {
        $this->type = $type;
        $this->sticky = $sticky;
        $this->overlap = $overlap;
        $this->theme = $theme;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::layout.index');
    }
}
