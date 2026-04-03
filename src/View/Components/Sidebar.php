<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Sidebar extends Component
{
    public ?string $brand;
    public ?string $logo;
    public string $theme;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $brand = null,
        ?string $logo = null,
        string $theme = 'dark'
    ) {
        $this->brand = $brand;
        $this->logo = $logo;
        $this->theme = $theme;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::sidebar.index');
    }
}
