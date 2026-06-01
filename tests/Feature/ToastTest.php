<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class ToastTest extends TestCase
{
    public function test_clase_base_toast(): void
    {
        $this->blade('<x-tabler::toast>Hola</x-tabler::toast>')
            ->assertSee('class="toast"', false);
    }

    public function test_renderiza_titulo_en_la_cabecera(): void
    {
        $this->blade('<x-tabler::toast title="Guardado">Listo</x-tabler::toast>')
            ->assertSee('toast-header', false)
            ->assertSee('Guardado');
    }

    public function test_renderiza_cuerpo_con_el_slot(): void
    {
        $this->blade('<x-tabler::toast>Mensaje del cuerpo</x-tabler::toast>')
            ->assertSee('toast-body', false)
            ->assertSee('Mensaje del cuerpo');
    }

    public function test_punto_de_color(): void
    {
        $this->blade('<x-tabler::toast title="Ok" color="success">x</x-tabler::toast>')
            ->assertSee('bg-success rounded me-2', false);
    }

    public function test_boton_de_cierre_cuando_es_dismissible(): void
    {
        $this->blade('<x-tabler::toast title="Aviso">x</x-tabler::toast>')
            ->assertSee('btn-close', false)
            ->assertSee('@click="dismiss()"', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        // Ultima clase computada del raiz: 'toast'. El consumidor queda contiguo despues.
        $this->blade('<x-tabler::toast class="custom">x</x-tabler::toast>')
            ->assertSee('toast custom', false);
    }
}
