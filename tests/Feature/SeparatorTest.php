<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class SeparatorTest extends TestCase
{
    public function test_renderiza_hr_por_defecto(): void
    {
        $this->blade('<x-tabler::separator />')
            ->assertSee('<hr', false);
    }

    public function test_vertical(): void
    {
        $this->blade('<x-tabler::separator :vertical="true" />')
            ->assertSee('hr-vertical', false);
    }

    public function test_con_texto(): void
    {
        $this->blade('<x-tabler::separator text="O" />')
            ->assertSee('hr-text', false)
            ->assertSee('O');
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::separator class="border-primary" />')
            ->assertSee('my-3 border-primary', false);
    }
}
