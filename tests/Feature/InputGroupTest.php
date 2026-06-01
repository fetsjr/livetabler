<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class InputGroupTest extends TestCase
{
    public function test_index_renderiza_input_group(): void
    {
        $this->blade('<x-tabler::input.group>contenido</x-tabler::input.group>')
            ->assertSee('input-group', false)
            ->assertSee('contenido');
    }

    public function test_index_no_usa_clases_de_tailwind(): void
    {
        $html = $this->blade('<x-tabler::input.group>contenido</x-tabler::input.group>')->__toString();

        // Bootstrap usa 'input-group'; la clase suelta 'flex' de Tailwind no debe aparecer.
        $this->assertDoesNotMatchRegularExpression('/class="flex[ "]/', $html);
    }

    public function test_prefix_renderiza_input_group_text(): void
    {
        $this->blade('<x-tabler::input.group.prefix>@</x-tabler::input.group.prefix>')
            ->assertSee('input-group-text', false)
            ->assertSee('@');
    }

    public function test_suffix_renderiza_input_group_text(): void
    {
        $this->blade('<x-tabler::input.group.suffix>.00</x-tabler::input.group.suffix>')
            ->assertSee('input-group-text', false)
            ->assertSee('.00');
    }

    public function test_index_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::input.group class="mb-3">contenido</x-tabler::input.group>')
            ->assertSee('input-group mb-3', false);
    }
}
