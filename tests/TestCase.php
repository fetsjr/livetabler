<?php

namespace Tabler\Tests;

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
            TablerServiceProvider::class,
        ];
    }
}
