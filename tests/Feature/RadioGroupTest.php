<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class RadioGroupTest extends TestCase
{
    public function test_apila_los_radios_por_defecto(): void
    {
        $this->blade('<x-tabler::radio.group>contenido</x-tabler::radio.group>')
            ->assertSee('d-flex flex-column', false)
            ->assertSee('contenido');
    }

    public function test_inline_dispone_los_radios_en_fila(): void
    {
        $this->blade('<x-tabler::radio.group :inline="true">contenido</x-tabler::radio.group>')
            ->assertSee('flex-row', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::radio.group class="mb-2">contenido</x-tabler::radio.group>')
            ->assertSee('gap-2 mb-2', false);
    }
}
