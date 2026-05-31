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
}
