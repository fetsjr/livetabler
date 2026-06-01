<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class TableTest extends TestCase
{
    public function test_clase_base(): void
    {
        $this->blade('<x-tabler::table><tbody></tbody></x-tabler::table>')
            ->assertSee('table table-vcenter', false);
    }

    public function test_striped(): void
    {
        $this->blade('<x-tabler::table :striped="true"><tbody></tbody></x-tabler::table>')
            ->assertSee('table-striped', false);
    }

    public function test_hover_por_defecto(): void
    {
        $this->blade('<x-tabler::table><tbody></tbody></x-tabler::table>')
            ->assertSee('table-hover', false);
    }

    public function test_card_table(): void
    {
        $this->blade('<x-tabler::table :card="true"><tbody></tbody></x-tabler::table>')
            ->assertSee('card-table', false);
    }

    public function test_responsive_por_defecto(): void
    {
        $this->blade('<x-tabler::table><tbody></tbody></x-tabler::table>')
            ->assertSee('table-responsive', false);
    }

    public function test_sin_responsive_no_envuelve(): void
    {
        $this->blade('<x-tabler::table :responsive="false"><tbody></tbody></x-tabler::table>')
            ->assertDontSee('table-responsive', false);
    }

    public function test_slot_pagination_muestra_card_footer(): void
    {
        $this->blade('<x-tabler::table><tbody></tbody><x-slot:pagination>Paginas</x-slot:pagination></x-tabler::table>')
            ->assertSee('card-footer', false)
            ->assertSee('Paginas', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::table class="mb-0"><tbody></tbody></x-tabler::table>')
            ->assertSee('table-hover mb-0', false);
    }
}
