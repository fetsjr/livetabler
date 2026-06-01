<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class SpacerTest extends TestCase
{
    public function test_renderiza_flex_1(): void
    {
        $this->blade('<x-tabler::spacer />')
            ->assertSee('flex-1', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::spacer class="mx-2" />')
            ->assertSee('flex-1 mx-2', false);
    }
}
