<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class ChartTest extends TestCase
{
    public function test_renderiza_div_con_id_y_altura_por_defecto(): void
    {
        $this->blade('<x-tabler::chart />')
            ->assertSee('id="chart-', false)
            ->assertSee('min-height: 350px;', false);
    }

    public function test_fusiona_clases_del_consumidor_en_el_div(): void
    {
        $this->blade('<x-tabler::chart class="mb-3" />')
            ->assertSee('class="mb-3"', false);
    }

    public function test_script_referencia_apexcharts_y_escapa_el_tipo(): void
    {
        $this->blade('<x-tabler::chart />')
            ->assertSee('window.ApexCharts', false)
            ->assertSee('new ApexCharts', false)
            ->assertSee("type: 'line'", false);
    }

    public function test_tipo_area_fluye_al_script(): void
    {
        $this->blade('<x-tabler::chart :type="\'area\'" />')
            ->assertSee("type: 'area'", false);
    }

    public function test_altura_personalizada_fija_min_height(): void
    {
        $this->blade('<x-tabler::chart :height="200" />')
            ->assertSee('min-height: 200px;', false)
            ->assertSee('height: 200', false);
    }
}
