<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class HeaderTest extends TestCase
{
    public function test_renderiza_page_header_y_slot(): void
    {
        $this->blade('<x-tabler::header>titulo</x-tabler::header>')
            ->assertSee('page-header', false)
            ->assertSee('titulo');
    }

    public function test_sticky_anade_sticky_top(): void
    {
        $this->blade('<x-tabler::header :sticky="true">x</x-tabler::header>')
            ->assertSee('sticky-top', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::header class="mb-3">x</x-tabler::header>')
            ->assertSee('d-print-none mb-3', false);
    }
}
