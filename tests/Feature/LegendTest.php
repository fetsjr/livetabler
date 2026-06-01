<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class LegendTest extends TestCase
{
    public function test_renderiza_legend_con_clase_y_contenido(): void
    {
        $html = $this->blade('<x-tabler::legend>Datos</x-tabler::legend>')->__toString();

        $this->assertStringContainsString('<legend', $html);
        $this->assertStringContainsString('form-label', $html);
        $this->assertStringContainsString('Datos', $html);
    }

    public function test_description_muestra_form_hint(): void
    {
        $this->blade('<x-tabler::legend description="Ayuda">Datos</x-tabler::legend>')
            ->assertSee('form-hint', false)
            ->assertSee('Ayuda', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::legend class="fw-bold">Datos</x-tabler::legend>')
            ->assertSee('form-label fw-bold', false);
    }
}
