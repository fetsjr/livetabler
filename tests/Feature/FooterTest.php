<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class FooterTest extends TestCase
{
    public function test_renderiza_footer_y_slot(): void
    {
        $this->blade('<x-tabler::footer>pie</x-tabler::footer>')
            ->assertSee('footer footer-transparent', false)
            ->assertSee('pie');
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::footer class="mt-4">x</x-tabler::footer>')
            ->assertSee('d-print-none mt-4', false);
    }
}
