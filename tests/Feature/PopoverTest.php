<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class PopoverTest extends TestCase
{
    public function test_clases_base_del_panel(): void
    {
        $this->blade('<x-tabler::popover>Contenido</x-tabler::popover>')
            ->assertSee('popover', false)
            ->assertSee('popover-body', false)
            ->assertSee('popover-arrow', false);
    }

    public function test_position_por_defecto_es_bottom(): void
    {
        // Sin prop position -> direccion bottom.
        $this->blade('<x-tabler::popover>Contenido</x-tabler::popover>')
            ->assertSee('bs-popover-bottom', false);
    }

    public function test_position_top(): void
    {
        $this->blade('<x-tabler::popover position="top">Contenido</x-tabler::popover>')
            ->assertSee('bs-popover-top', false);
    }

    public function test_position_left_y_right_mapean_a_start_y_end(): void
    {
        $this->blade('<x-tabler::popover position="left">Contenido</x-tabler::popover>')
            ->assertSee('bs-popover-start', false);

        $this->blade('<x-tabler::popover position="right">Contenido</x-tabler::popover>')
            ->assertSee('bs-popover-end', false);
    }

    public function test_renderiza_el_trigger_y_estado_alpine(): void
    {
        $this->blade('<x-tabler::popover><x-slot:trigger>Abrir</x-slot:trigger>Cuerpo</x-tabler::popover>')
            ->assertSee('x-data="{ open: false }"', false)
            ->assertSee('aria-haspopup="dialog"', false)
            ->assertSee('Abrir');
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        // La ultima clase computada de la raiz es 'd-inline-block' y la del consumidor
        // se anade AL FINAL: subcadena contigua "d-inline-block custom".
        $this->blade('<x-tabler::popover class="custom">Contenido</x-tabler::popover>')
            ->assertSee('d-inline-block custom', false);
    }
}
