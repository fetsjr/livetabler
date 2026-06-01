<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class TextTest extends TestCase
{
    public function test_renderiza_texto_secundario_con_slot(): void
    {
        $this->blade('<x-tabler::text>Hola</x-tabler::text>')
            ->assertSee('text-secondary', false)
            ->assertSee('Hola');
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::text class="mb-0">Hola</x-tabler::text>')
            ->assertSee('lead mb-0', false);
    }
}
