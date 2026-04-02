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
            $this->loadViewsFrom($path, 'tabler');
            
            // Registro Estándar
            Blade::anonymousComponentPath($path, 'tabler');

            // REGISTRO DE ALIAS PARA SOPORTAR <tabler:...>
            $this->registerAliases();
        }
    }

    protected function registerAliases()
    {
        // Mapeo manual de etiquetas tabler: a las vistas del paquete
        Blade::component('tabler::accordion.index', 'tabler:accordion');
        Blade::component('tabler::accordion.item', 'tabler:accordion.item');
        Blade::component('tabler::accordion.heading', 'tabler:accordion.heading');
        Blade::component('tabler::accordion.content', 'tabler:accordion.content');
        
        // Agregamos otros comunes
        Blade::component('tabler::button.index', 'tabler:button');
        Blade::component('tabler::input.index', 'tabler:input');
        Blade::component('tabler::badge.index', 'tabler:badge');
    }

    public function register(): void
    {
        //
    }
}
