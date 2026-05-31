<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class IconTest extends TestCase
{
    public function test_renderiza_el_icono_por_nombre(): void
    {
        $this->blade('<x-tabler::icon name="home" />')
            ->assertSee('ti ti-home', false);
    }

    public function test_aplica_el_tamano(): void
    {
        $this->blade('<x-tabler::icon name="home" :size="24" />')
            ->assertSee('font-size:24px', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $html = $this->blade('<x-tabler::icon name="home" class="text-red" />')->__toString();
        // Una sola etiqueta <i> con ambas clases en un único atributo class.
        $this->assertStringContainsString('ti-home', $html);
        $this->assertStringContainsString('text-red', $html);
        $this->assertSame(1, substr_count($html, 'class='));
    }
}
