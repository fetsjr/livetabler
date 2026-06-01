<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class BadgeTest extends TestCase
{
    public function test_clase_base(): void
    {
        $this->blade('<x-tabler::badge>Texto</x-tabler::badge>')
            ->assertSee('badge', false);
    }

    public function test_variante_de_color(): void
    {
        $this->blade('<x-tabler::badge variant="success">OK</x-tabler::badge>')
            ->assertSee('bg-success', false);
    }

    public function test_dot(): void
    {
        $this->blade('<x-tabler::badge :dot="true"></x-tabler::badge>')
            ->assertSee('badge-dot', false);
    }

    public function test_outline_usa_text_y_no_bg(): void
    {
        $html = $this->blade('<x-tabler::badge :outline="true" variant="danger">OK</x-tabler::badge>')->__toString();
        $this->assertStringContainsString('badge-outline', $html);
        $this->assertStringContainsString('text-danger', $html);
        // El outline NO debe pintar fondo de color.
        $this->assertStringNotContainsString('bg-danger', $html);
    }

    public function test_pill(): void
    {
        $this->blade('<x-tabler::badge :pill="true">9</x-tabler::badge>')
            ->assertSee('badge-pill', false);
    }

    public function test_usa_label_cuando_no_hay_slot(): void
    {
        $this->blade('<x-tabler::badge label="9" />')
            ->assertSee('9');
    }

    public function test_el_slot_tiene_prioridad_sobre_label(): void
    {
        $html = $this->blade('<x-tabler::badge label="9">Contenido</x-tabler::badge>')->__toString();
        $this->assertStringContainsString('Contenido', $html);
        $this->assertStringNotContainsString('9', $html);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::badge variant="primary" class="ms-2">OK</x-tabler::badge>')
            ->assertSee('bg-primary ms-2', false);
    }
}
