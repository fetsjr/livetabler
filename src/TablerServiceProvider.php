<?php

namespace Tabler;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;

class TablerServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     */
    public function boot(): void
    {
        $path = realpath(__DIR__.'/../stubs/resources/views/tabler');

        if ($path) {
            // 1. Cargamos las vistas para acceder a ellas vía tabler::
            $this->loadViewsFrom($path, 'tabler');

            // 2. Registramos los componentes anónimos bajo el namespace 'tabler'
            Blade::anonymousComponentPath($path, 'tabler');
        }

        // 3. REGISTRO DEL PRE-COMPILADOR (Inspirado en la lógica de Flux)
        // Esto traduce <tabler:...> a <x-tabler::...> antes de que Laravel lo procese
        $this->app->afterResolving('blade.compiler', function (BladeCompiler $blade) {
            $blade->precompiler(function ($string) {
                return preg_replace_callback('/<\/?tabler:([a-z0-9\-\.]+)/i', function ($matches) {
                    return str_replace('tabler:', 'x-tabler::', $matches[0]);
                }, $string);
            });
        });
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        //
    }
}
