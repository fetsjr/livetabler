<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;

class PageBody extends Component
{
    public bool $fluid;

    public function __construct(bool $fluid = false)
    {
        $this->fluid = $fluid;
    }

    public function render()
    {
        return view('tabler::page-body.index');
    }
}
