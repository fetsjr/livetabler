<?php

namespace Tabler\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Dropzone extends Component
{
    public string $id;
    public string $url;
    public ?string $name;
    public int $maxFiles;
    public string $acceptedFiles;
    public string $message;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $url,
        ?string $id = null,
        ?string $name = 'file',
        int $maxFiles = 1,
        string $acceptedFiles = 'image/*',
        string $message = 'Arrastra tus archivos aquí o haz clic para subir'
    ) {
        $this->id = $id ?? 'dz-' . Str::random(8);
        $this->url = $url;
        $this->name = $name;
        $this->maxFiles = $maxFiles;
        $this->acceptedFiles = $acceptedFiles;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tabler::dropzone.index');
    }
}
