<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class SkeletonTest extends TestCase
{
    public function test_clases_base(): void
    {
        $this->blade('<x-tabler::skeleton />')
            ->assertSee('placeholder-glow', false)
            ->assertSee('placeholder', false);
    }

    public function test_circle_anade_rounded_circle(): void
    {
        $this->blade('<x-tabler::skeleton :circle="true" />')
            ->assertSee('rounded-circle', false);
    }

    public function test_lines_renderiza_el_numero_exacto_de_lineas(): void
    {
        $html = $this->blade('<x-tabler::skeleton :lines="3" />')->__toString();

        // Con varias líneas cada una se renderiza como '<div class="placeholder w-100'.
        // Contamos esas aperturas para verificar que hay exactamente 3 líneas.
        $this->assertSame(3, substr_count($html, '<div class="placeholder w-100'));
    }

    public function test_una_sola_linea_usa_columna_de_ancho(): void
    {
        $this->blade('<x-tabler::skeleton :lines="1" width="75" />')
            ->assertSee('col-75', false);
    }

    public function test_glow_false_no_anade_placeholder_glow(): void
    {
        $this->blade('<x-tabler::skeleton :glow="false" />')
            ->assertDontSee('placeholder-glow', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::skeleton class="my-2" />')
            ->assertSee('placeholder-glow my-2', false);
    }
}
