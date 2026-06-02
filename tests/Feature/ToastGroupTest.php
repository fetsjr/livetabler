<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class ToastGroupTest extends TestCase
{
    public function test_clases_base_del_contenedor(): void
    {
        $this->blade('<x-tabler::toast.group />')
            ->assertSee('toast-container position-fixed p-3', false);
    }

    public function test_posicion_por_defecto_es_abajo_derecha(): void
    {
        $this->blade('<x-tabler::toast.group />')
            ->assertSee('bottom-0 end-0', false);
    }

    public function test_posicion_arriba_izquierda(): void
    {
        $this->blade('<x-tabler::toast.group position="top-left" />')
            ->assertSee('top-0 start-0', false);
    }

    public function test_escucha_el_evento_global_y_renderiza_slot(): void
    {
        $this->blade('<x-tabler::toast.group>Contenido estatico</x-tabler::toast.group>')
            ->assertSee('@toast-show.window', false)
            ->assertSee('Contenido estatico');
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        // Ultima clase computada del raiz: la de posicion 'bottom-0 end-0'.
        // El consumidor 'custom' debe quedar contiguo justo despues.
        $this->blade('<x-tabler::toast.group class="custom" />')
            ->assertSee('end-0 custom', false);
    }

    public function test_template_no_lleva_x_show_inerte(): void
    {
        // El div del template x-for ya es visible por la clase estatica 'toast show';
        // un x-show="true" seria ruido inerte que nunca cambia.
        $this->blade('<x-tabler::toast.group />')
            ->assertSee('toast show', false)
            ->assertDontSee('x-show="true"', false);
    }

    public function test_aria_live_dinamico_por_tipo(): void
    {
        // En el template x-for, role/aria-live se derivan del tipo via binding Alpine:
        // assertive/alert para danger/error y polite/status para el resto.
        $this->blade('<x-tabler::toast.group />')
            ->assertSee(":aria-live=", false)
            ->assertSee(":role=", false)
            ->assertSee('assertive', false)
            ->assertSee('polite', false);
    }
}
