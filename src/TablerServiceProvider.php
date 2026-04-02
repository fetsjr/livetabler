<?php

namespace Tabler;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Log;

class TablerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // LOG DE DEPURACIÓN - Revisa storage/logs/laravel.log
        Log::info('LiveTabler Service Provider Cargado Correctamente');

        $path = realpath(__DIR__.'/../stubs/resources/views/tabler');

        if ($path) {
            $this->loadViewsFrom($path, 'tabler');
            Blade::anonymousComponentPath($path, 'tabler');
            $this->registerAliases();
        }
    }

    protected function registerAliases()
    {
        Blade::component('tabler::accordion.index', 'tabler:accordion');
        Blade::component('tabler::accordion.item', 'tabler:accordion.item');
        Blade::component('tabler::accordion.heading', 'tabler:accordion.heading');
        Blade::component('tabler::accordion.content', 'tabler:accordion.content');
        
        Blade::component('tabler::button.index', 'tabler:button');
        Blade::component('tabler::input.index', 'tabler:input');
        Blade::component('tabler::badge.index', 'tabler:badge');
    }

    public function register(): void
    {
        //
    }
}
