<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class AlertTest extends TestCase
{
    public function test_variante_info_por_defecto(): void
    {
        $this->blade('<x-tabler::alert>Mensaje</x-tabler::alert>')
            ->assertSee('alert alert-info', false);
    }

    public function test_variante_danger(): void
    {
        $this->blade('<x-tabler::alert variant="danger">Mensaje</x-tabler::alert>')
            ->assertSee('alert-danger', false);
    }

    public function test_muestra_el_titulo(): void
    {
        $this->blade('<x-tabler::alert title="Atención">Mensaje</x-tabler::alert>')
            ->assertSee('alert-title', false)
            ->assertSee('Atención');
    }

    public function test_dismissible_anade_clase_y_boton_de_cierre(): void
    {
        $this->blade('<x-tabler::alert :dismissible="true">Mensaje</x-tabler::alert>')
            ->assertSee('alert-dismissible', false)
            ->assertSee('btn-close', false);
    }

    public function test_icono(): void
    {
        $this->blade('<x-tabler::alert icon="info-circle">Mensaje</x-tabler::alert>')
            ->assertSee('alert-icon', false)
            ->assertSee('ti-info-circle', false);
    }

    public function test_muestra_el_contenido_del_slot(): void
    {
        $this->blade('<x-tabler::alert>Hola mundo</x-tabler::alert>')
            ->assertSee('Hola mundo');
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::alert class="shadow">Mensaje</x-tabler::alert>')
            ->assertSee('alert-info shadow', false);
    }
}
