<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Datatable extends Component
{
    public string $id;
    public array $columns;
    public ?string $url;
    public bool $searchable;
    public bool $paginated;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $id = null,
        array $columns = [],
        ?string $url = null,
        bool $searchable = true,
        bool $paginated = true
    ) {
        $this->id = $id ?? 'dt-' . Str::random(8);
        $this->columns = $columns;
        $this->url = $url;
        $this->searchable = $searchable;
        $this->paginated = $paginated;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::datatable.index');
    }
}
