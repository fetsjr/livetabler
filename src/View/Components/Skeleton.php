<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class Skeleton extends Component
{
    public int $lines;
    public string $width;
    public string $size;
    public bool $glow;
    public bool $circle;

    /**
     * Create a new component instance.
     */
    public function __construct(
        int $lines = 1,
        string $width = '100',
        string $size = 'md',
        bool $glow = true,
        bool $circle = false
    ) {
        $this->lines = $lines;
        $this->width = $width;
        $this->size = $size;
        $this->glow = $glow;
        $this->circle = $circle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::skeleton.index');
    }
}
