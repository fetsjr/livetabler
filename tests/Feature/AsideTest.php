<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class AsideTest extends TestCase
{
    public function test_renderiza_navbar_vertical_y_slot(): void
    {
        $this->blade('<x-tabler::aside>menu</x-tabler::aside>')
            ->assertSee('navbar-vertical', false)
            ->assertSee('menu');
    }

    public function test_sticky_anade_sticky_top(): void
    {
        $this->blade('<x-tabler::aside :sticky="true">x</x-tabler::aside>')
            ->assertSee('sticky-top', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::aside class="bg-dark">x</x-tabler::aside>')
            ->assertSee('h-100 bg-dark', false);
    }
}
