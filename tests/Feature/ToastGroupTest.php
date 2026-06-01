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
}
