<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class RibbonTest extends TestCase
{
    public function test_clases_por_defecto(): void
    {
        $this->blade('<x-tabler::ribbon>NEW</x-tabler::ribbon>')
            ->assertSee('ribbon', false)
            ->assertSee('ribbon-top', false)
            ->assertSee('bg-primary', false);
    }

    public function test_color_personalizado(): void
    {
        $this->blade('<x-tabler::ribbon color="red">NEW</x-tabler::ribbon>')
            ->assertSee('bg-red', false);
    }

    public function test_posicion_personalizada(): void
    {
        $this->blade('<x-tabler::ribbon position="bottom">NEW</x-tabler::ribbon>')
            ->assertSee('ribbon-bottom', false);
    }

    public function test_estilo_marcador(): void
    {
        $this->blade('<x-tabler::ribbon :bookmark="true">NEW</x-tabler::ribbon>')
            ->assertSee('ribbon-bookmark', false);
    }

    public function test_muestra_el_slot(): void
    {
        $this->blade('<x-tabler::ribbon>NEW</x-tabler::ribbon>')
            ->assertSee('NEW');
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::ribbon class="shadow">NEW</x-tabler::ribbon>')
            ->assertSee('bg-primary shadow', false);
    }

    public function test_no_contiene_codigo_de_chart_ni_datatable(): void
    {
        $html = $this->blade('<x-tabler::ribbon>NEW</x-tabler::ribbon>')->__toString();
        // La corrupción dejó fragmentos de chart (chart-) y datatable (dt-): no deben aparecer.
        $this->assertStringNotContainsString('chart-', $html);
        $this->assertStringNotContainsString('dt-', $html);
    }
}
