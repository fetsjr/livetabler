<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class ContainerTest extends TestCase
{
    public function test_renderiza_container_xl_y_slot(): void
    {
        $this->blade('<x-tabler::container>contenido</x-tabler::container>')
            ->assertSee('container-xl', false)
            ->assertSee('contenido');
    }

    public function test_fluid_usa_container_fluid(): void
    {
        $this->blade('<x-tabler::container :fluid="true">x</x-tabler::container>')
            ->assertSee('container-fluid', false)
            ->assertDontSee('container-xl', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::container class="py-4">x</x-tabler::container>')
            ->assertSee('container-xl py-4', false);
    }
}
