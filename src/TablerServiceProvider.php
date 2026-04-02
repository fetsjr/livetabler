<?php

namespace Tabler;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class TablerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // 1. Cargamos las vistas del paquete
        $this->loadViewsFrom(__DIR__.'/../stubs/resources/views/tabler', 'tabler');

        // 2. Registramos el path de componentes anónimos
        Blade::anonymousComponentPath(__DIR__.'/../stubs/resources/views/tabler', 'tabler');

        // 3. REGISTRO DEL PRE-COMPILADOR (Estilo Flux)
        // Esto traduce <tabler:xxx> a <x-tabler::xxx> antes de que Laravel lo procese
        Blade::precompiler(function ($value) {
            return preg_replace_callback('/<\/?tabler:([a-z0-9\-\.\:]+)/', function ($matches) {
                return str_replace('tabler:', 'x-tabler::', $matches[0]);
            }, $value);
        });
    }

    public function register(): void
    {
        //
    }
}
