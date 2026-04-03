<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class PageHeader extends Component
{
    public ?string $title;
    public ?string $pretitle;
    public array $actions;

    public function __construct(?string $title = null, ?string $pretitle = null, array $actions = [])
    {
        $this->title = $title;
        $this->pretitle = $pretitle;
        $this->actions = $actions;
    }

    public function render()
    {
        return view('tabler::page-header.index');
    }
}

// Nota: Crearé también el PageBody como clase inline por simplicidad si es necesario 
// o simplemente lo manejaré en el Blade. Por ahora, hagamos PageBody también.
