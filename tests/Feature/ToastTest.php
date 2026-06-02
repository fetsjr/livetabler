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

    public function test_una_sola_fuente_de_verdad_de_visibilidad(): void
    {
        // El toast debe usar SOLO :class="{ 'show': visible }" (Tabler oculta con :not(.show)).
        // No debe existir un x-show redundante junto a esa clase: seria doble control del display.
        $this->blade('<x-tabler::toast>x</x-tabler::toast>')
            ->assertSee(":class=\"{ 'show': visible }\"", false)
            ->assertDontSee('x-show', false);
    }

    public function test_cierre_sin_cabecera_renderiza_btn_close_en_el_cuerpo(): void
    {
        // Rama sin titulo: el btn-close se renderiza dentro del toast-body con float-end.
        $this->blade('<x-tabler::toast>Solo cuerpo</x-tabler::toast>')
            ->assertSee('toast-body', false)
            ->assertSee('btn-close float-end', false);
    }

    public function test_sin_cabecera_y_no_dismissible_no_pinta_btn_close(): void
    {
        $this->blade('<x-tabler::toast :dismissible="false">Solo cuerpo</x-tabler::toast>')
            ->assertDontSee('btn-close', false);
    }

    public function test_aria_live_assertive_para_danger(): void
    {
        // Mensajes urgentes/error: role=alert + aria-live=assertive.
        $this->blade('<x-tabler::toast color="danger">x</x-tabler::toast>')
            ->assertSee('aria-live="assertive"', false)
            ->assertSee('role="alert"', false);
    }

    public function test_aria_live_polite_para_no_urgente(): void
    {
        // Info/exito no urgente: role=status + aria-live=polite.
        $this->blade('<x-tabler::toast color="success">x</x-tabler::toast>')
            ->assertSee('aria-live="polite"', false)
            ->assertSee('role="status"', false);
    }

    public function test_aria_live_polite_por_defecto(): void
    {
        $this->blade('<x-tabler::toast>x</x-tabler::toast>')
            ->assertSee('aria-live="polite"', false)
            ->assertSee('role="status"', false);
    }
}
