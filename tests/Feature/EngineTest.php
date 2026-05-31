<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class EngineTest extends TestCase
{
    /**
     * Comprobamos que el componente button se renderiza con la sintaxis
     * estándar de Laravel <x-tabler::button> y produce las clases base de Tabler.
     */
    public function test_button_se_renderiza_con_sintaxis_estandar(): void
    {
        $this->blade('<x-tabler::button>Guardar</x-tabler::button>')
            ->assertSee('btn', false)
            ->assertSee('btn-primary', false)
            ->assertSee('Guardar');
    }

    /**
     * Los sub-componentes anidados se resuelven con notación de punto:
     * <x-tabler::accordion.item> -> accordion/item.blade.php.
     */
    public function test_subcomponente_anidado_se_resuelve_con_punto(): void
    {
        $vista = $this->blade('<x-tabler::accordion.item heading="Sección">Contenido</x-tabler::accordion.item>');

        // Solo verificamos que renderiza sin lanzar excepción y muestra su contenido.
        $vista->assertSee('Contenido');
    }
}
