<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Chart extends Component
{
    public string $id;
    public string $type;
    public array $options;
    public string $height;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $id = null,
        string $type = 'line',
        array $options = [],
        string $height = '300'
    ) {
        $this->id = $id ?? 'chart-' . Str::random(8);
        $this->type = $type;
        $this->options = $options;
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::chart.index');
    }
}
