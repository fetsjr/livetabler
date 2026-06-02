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

    public function test_el_panel_no_lleva_z_3(): void
    {
        // z-3 (z-index:3) ANULABA el z-index nativo de .popover (1070) y hundia el
        // popover por debajo de modales/dropdowns. Tras el fix no debe emitirse z-3,
        // pero el panel debe seguir teniendo la clase 'popover' (que aporta su z-index).
        $this->blade('<x-tabler::popover>Contenido</x-tabler::popover>')
            ->assertDontSee('z-3', false)
            ->assertSee('popover', false);
    }

    public function test_clases_del_panel(): void
    {
        // El panel (raiz del bug de z-index) ahora si esta cubierto: posicion absoluta,
        // role dialog y visibilidad Alpine.
        $this->blade('<x-tabler::popover>Contenido</x-tabler::popover>')
            ->assertSee('position-absolute', false)
            ->assertSee('role="dialog"', false)
            ->assertSee('x-show="open"', false);
    }

    public function test_position_top_emite_clases_de_posicion_del_panel(): void
    {
        // Con position="top" el panel se ancla arriba del disparador.
        $this->blade('<x-tabler::popover position="top">Contenido</x-tabler::popover>')
            ->assertSee('bottom-100 start-50 translate-middle-x mb-2', false);
    }

    public function test_el_trigger_es_accesible_por_teclado(): void
    {
        // El disparador role="button" debe ser enfocable (tabindex="0") y operable
        // por teclado (Enter/Space abren el popover).
        $this->blade('<x-tabler::popover><x-slot:trigger>Abrir</x-slot:trigger>Cuerpo</x-tabler::popover>')
            ->assertSee('tabindex="0"', false)
            ->assertSee('@keydown.enter.prevent="open = ! open"', false)
            ->assertSee('@keydown.space.prevent="open = ! open"', false);
    }
}
