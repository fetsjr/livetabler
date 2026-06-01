<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class SubheadingTest extends TestCase
{
    public function test_renderiza_h4_con_slot(): void
    {
        $this->blade('<x-tabler::subheading>Subtítulo</x-tabler::subheading>')
            ->assertSee('h4', false)
            ->assertSee('Subtítulo');
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::subheading class="text-muted">Subtítulo</x-tabler::subheading>')
            ->assertSee('mb-2 text-muted', false);
    }
}
