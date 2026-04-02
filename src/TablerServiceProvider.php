<?php

namespace Tabler;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class TablerServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     */
    public function boot(): void
    {
        // 1. Cargamos el namespace de vistas para usar @include('tabler::...') si fuera necesario
        if (is_dir(__DIR__.'/../stubs/resources/views/tabler')) {
            $this->loadViewsFrom(__DIR__.'/../stubs/resources/views/tabler', 'tabler');
        }

        // 2. Registramos los componentes bajo el namespace 'tabler'
        $this->bootComponentPath();
    }

    /**
     * Registrar componentes anónimos bajo el namespace 'tabler'.
     */
    public function bootComponentPath(): void
    {
        // Este es el método estándar de Laravel para <x-tabler::...>
        Blade::anonymousComponentPath(__DIR__.'/../stubs/resources/views/tabler', 'tabler');
        
        // IMPORTANTE: Esto es lo que permite usar los dos puntos <tabler:accordion>
        Blade::componentNamespace('Tabler\\stubs\\resources\\views\\tabler', 'tabler');
    }

    public function register(): void
    {
        //
    }
}
