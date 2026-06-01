<?php

namespace Tabler\Tests;

use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Tabler\TablerServiceProvider;

/**
 * Clase base para todas las pruebas de LiveTabler.
 *
 * Usa Orchestra Testbench para arrancar una mini-aplicación Laravel en memoria
 * y registra el proveedor de servicios de la librería. El trait WithWorkbench
 * carga además las rutas y vistas del playground (carpeta workbench/).
 */
class TestCase extends BaseTestCase
{
    use WithWorkbench;

    /**
     * Proveedores de servicios que se registran en la app de pruebas.
     */
    protected function getPackageProviders($app): array
    {
        return [
            LivewireServiceProvider::class,
            TablerServiceProvider::class,
        ];
    }

    /**
     * Define la configuración de entorno de la app de pruebas.
     *
     * Establece una clave de cifrado para que las peticiones HTTP del
     * playground (que pasan por el middleware de sesión/cookies) funcionen.
     */
    protected function defineEnvironment($app): void
    {
        $app['config']->set('app.key', 'base64:hsx1Kqf2YbHRBHGcjTKj8K8DSpkLfFsVWl4nXg4kQ1Y=');
    }
}
