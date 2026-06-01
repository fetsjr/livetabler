<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class TooltipTest extends TestCase
{
    public function test_renderiza_data_bs_toggle(): void
    {
        $this->blade('<x-tabler::tooltip text="Ayuda">?</x-tabler::tooltip>')
            ->assertSee('data-bs-toggle="tooltip"', false);
    }

    public function test_usa_el_texto_como_title(): void
    {
        $this->blade('<x-tabler::tooltip text="Ayuda">?</x-tabler::tooltip>')
            ->assertSee('title="Ayuda"', false);
    }

    public function test_posicion_personalizada(): void
    {
        $this->blade('<x-tabler::tooltip text="Ayuda" position="bottom">?</x-tabler::tooltip>')
            ->assertSee('data-bs-placement="bottom"', false);
    }

    public function test_muestra_el_slot(): void
    {
        $this->blade('<x-tabler::tooltip text="Ayuda">Contenido</x-tabler::tooltip>')
            ->assertSee('Contenido');
    }
}
