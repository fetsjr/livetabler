<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class AccordionTest extends TestCase
{
    public function test_index_renderiza_accordion_con_id(): void
    {
        $html = $this->blade('<x-tabler::accordion>contenido</x-tabler::accordion>')->__toString();

        $this->assertStringContainsString('accordion', $html);
        $this->assertStringContainsString('id=', $html);
    }

    public function test_index_flush_anade_clase(): void
    {
        $this->blade('<x-tabler::accordion :flush="true" />')
            ->assertSee('accordion-flush', false);
    }

    public function test_index_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::accordion class="my-3" />')
            ->assertSee('accordion my-3', false);
    }

    public function test_item_renderiza_estructura_base(): void
    {
        $html = $this->blade('<x-tabler::accordion.item title="Hola" />')->__toString();

        $this->assertStringContainsString('accordion-item', $html);
        $this->assertStringContainsString('accordion-button', $html);
        $this->assertStringContainsString('accordion-collapse', $html);
    }

    public function test_item_activo_muestra_show_y_boton_no_collapsed(): void
    {
        $html = $this->blade('<x-tabler::accordion.item :active="true" title="Abierto" />')->__toString();

        $this->assertStringContainsString('show', $html);
        $this->assertStringNotContainsString('collapsed', $html);
    }

    public function test_item_inactivo_boton_collapsed(): void
    {
        $this->blade('<x-tabler::accordion.item title="Cerrado" />')
            ->assertSee('collapsed', false);
    }

    public function test_item_muestra_titulo(): void
    {
        $this->blade('<x-tabler::accordion.item title="Sección" />')
            ->assertSee('Sección');
    }

    public function test_item_con_parent_id_anade_data_bs_parent(): void
    {
        $this->blade('<x-tabler::accordion.item title="X" parentId="g1" />')
            ->assertSee('data-bs-parent="#g1"', false);
    }

    public function test_item_sin_parent_id_no_renderiza_data_bs_parent(): void
    {
        $this->blade('<x-tabler::accordion.item title="X" />')
            ->assertDontSee('data-bs-parent', false);
    }
}
