<?php

namespace Tabler;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

/**
 * Proveedor de servicios de LiveTabler.
 *
 * Registra los componentes Blade de la librería usando exclusivamente el
 * mecanismo estándar de Laravel: una ruta de componentes anónimos con el
 * prefijo "tabler". No se usa ningún compilador de etiquetas personalizado;
 * los componentes se escriben con la sintaxis nativa <x-tabler::nombre>.
 */
class TablerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->bootComponentes();
        $this->bootDirectivas();
        $this->bootPublicacion();
    }

    /**
     * Registra la ruta de componentes anónimos.
     *
     * Gracias a esto, <x-tabler::button> resuelve a
     * resources/views/components/button/index.blade.php, y los sub-componentes
     * con notación de punto: <x-tabler::accordion.item> -> accordion/item.blade.php.
     */
    protected function bootComponentes(): void
    {
        $ruta = __DIR__.'/../resources/views/components';

        // Registra además el namespace de vistas "tabler::" para poder incluir
        // parciales con @include('tabler::...') o view('tabler::...') desde otros
        // componentes durante la migración. La sintaxis <x-tabler::...> NO depende
        // de esto, sino de anonymousComponentPath (línea siguiente).
        $this->loadViewsFrom($ruta, 'tabler');

        // Habilita la sintaxis de componente anónimo <x-tabler::...>.
        Blade::anonymousComponentPath($ruta, 'tabler');
    }

    /**
     * Registra las directivas Blade para inyectar los estilos y scripts de Tabler.
     */
    protected function bootDirectivas(): void
    {
        // @tablerStyles imprime las hojas de estilo publicadas de Tabler.
        Blade::directive('tablerStyles', function () {
            return <<<'HTML'
                <link rel="stylesheet" href="{{ asset('vendor/tabler/tabler.min.css') }}">
                <link rel="stylesheet" href="{{ asset('vendor/tabler/tabler-vendors.min.css') }}">
            HTML;
        });

        // @tablerScripts imprime el JavaScript publicado de Tabler.
        Blade::directive('tablerScripts', function () {
            return '<script src="{{ asset(\'vendor/tabler/tabler.js\') }}" defer></script>';
        });
    }

    /**
     * Declara los assets publicables (CSS, JS y fuentes) bajo la etiqueta "tabler-assets".
     */
    protected function bootPublicacion(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/css' => public_path('vendor/tabler'),
                __DIR__.'/../resources/js' => public_path('vendor/tabler'),
                __DIR__.'/../resources/fonts' => public_path('vendor/fonts'),
            ], 'tabler-assets');
        }
    }
}
