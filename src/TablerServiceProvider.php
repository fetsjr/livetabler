<?php

namespace Tabler;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class TablerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../stubs/resources/views/tabler', 'tabler');

        // Registro de componentes con el prefijo tabler:
        // Registramos manualmente los principales para asegurar que el ":" funcione
        Blade::component('tabler::accordion.index', 'tabler:accordion');
        Blade::component('tabler::accordion.item', 'tabler:accordion.item');
        Blade::component('tabler::accordion.heading', 'tabler:accordion.heading');
        Blade::component('tabler::accordion.content', 'tabler:accordion.content');
        
        // También registramos el path por si acaso para componentes futuros
        Blade::anonymousComponentPath(__DIR__.'/../stubs/resources/views/tabler', 'tabler');
    }

    public function register(): void
    {
        //
    }
}
