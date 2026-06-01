<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class TimelineTest extends TestCase
{
    public function test_index_renderiza_list_timeline(): void
    {
        $this->blade('<x-tabler::timeline>contenido</x-tabler::timeline>')
            ->assertSee('list list-timeline', false);
    }

    public function test_index_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::timeline class="mt-3" />')
            ->assertSee('list list-timeline mt-3', false);
    }

    public function test_item_renderiza_icono_por_defecto(): void
    {
        $this->blade('<x-tabler::timeline.item />')
            ->assertSee('list-timeline-icon bg-primary', false)
            ->assertSee('ti-check', false);
    }

    public function test_item_color_personalizado(): void
    {
        $this->blade('<x-tabler::timeline.item color="red" />')
            ->assertSee('bg-red', false);
    }

    public function test_item_muestra_titulo(): void
    {
        $this->blade('<x-tabler::timeline.item title="Creado" />')
            ->assertSee('Creado');
    }

    public function test_item_con_time_muestra_hora(): void
    {
        $this->blade('<x-tabler::timeline.item time="10:30" />')
            ->assertSee('list-timeline-time', false)
            ->assertSee('10:30');
    }

    public function test_item_sin_time_no_renderiza_div_vacio(): void
    {
        $this->blade('<x-tabler::timeline.item title="Sin hora" />')
            ->assertDontSee('list-timeline-time', false);
    }
}
