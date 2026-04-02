<?php

namespace Tabler;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class TablerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $path = realpath(__DIR__.'/../stubs/resources/views/tabler');

        if ($path) {
            // 1. Cargar vistas tradicionales
            $this->loadViewsFrom($path, 'tabler');

            // 2. Registrar componentes anónimos
            Blade::anonymousComponentPath($path, 'tabler');
        }

        // 3. Pre-compilador estilo Flux
        Blade::precompiler(function ($value) {
            return preg_replace_callback('/(<\/?\s*)tabler:([a-z0-9\-\.]+)/i', function ($matches) {
                return $matches[1] . 'x-tabler::' . $matches[2];
            }, $value);
        });
    }

    public function register(): void
    {
        //
    }
}
