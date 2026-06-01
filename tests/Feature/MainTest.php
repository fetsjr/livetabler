<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class MainTest extends TestCase
{
    public function test_renderiza_page_body_container_y_slot(): void
    {
        $this->blade('<x-tabler::main>contenido</x-tabler::main>')
            ->assertSee('page-body', false)
            ->assertSee('container-xl', false)
            ->assertSee('contenido');
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::main class="pt-0">x</x-tabler::main>')
            ->assertSee('page-body pt-0', false);
    }
}
