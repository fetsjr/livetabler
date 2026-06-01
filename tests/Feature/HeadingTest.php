<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class HeadingTest extends TestCase
{
    public function test_renderiza_h1_por_defecto(): void
    {
        $this->blade('<x-tabler::heading>Título</x-tabler::heading>')
            ->assertSee('<h1', false)
            ->assertSee('Título');
    }

    public function test_nivel_personalizado(): void
    {
        $this->blade('<x-tabler::heading :level="3">Título</x-tabler::heading>')
            ->assertSee('<h3', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::heading class="text-center">Título</x-tabler::heading>')
            ->assertSee('text-center', false);
    }
}
