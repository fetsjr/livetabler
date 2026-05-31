<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class FieldTest extends TestCase
{
    public function test_variante_block_por_defecto(): void
    {
        $this->blade('<x-tabler::field>x</x-tabler::field>')
            ->assertSee('mb-3', false);
    }

    public function test_variante_inline(): void
    {
        $this->blade('<x-tabler::field variant="inline">x</x-tabler::field>')
            ->assertSee('row', false);
    }

    public function test_variante_bare_sin_margen(): void
    {
        $this->blade('<x-tabler::field variant="bare">x</x-tabler::field>')
            ->assertDontSee('mb-3', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::field class="border">x</x-tabler::field>')
            ->assertSee('mb-3 border', false);
    }
}
