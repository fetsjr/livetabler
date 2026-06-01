<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class ProgressTest extends TestCase
{
    public function test_clases_base(): void
    {
        $this->blade('<x-tabler::progress />')
            ->assertSee('progress', false)
            ->assertSee('progress-bar', false);
    }

    public function test_valor(): void
    {
        $this->blade('<x-tabler::progress :value="50" />')
            ->assertSee('width: 50%', false);
    }

    public function test_color(): void
    {
        $this->blade('<x-tabler::progress variant="success" />')
            ->assertSee('bg-success', false);
    }

    public function test_tamano(): void
    {
        $this->blade('<x-tabler::progress size="sm" />')
            ->assertSee('progress-sm', false);
    }

    public function test_indeterminate(): void
    {
        $this->blade('<x-tabler::progress :indeterminate="true" />')
            ->assertSee('progress-bar-indeterminate', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::progress class="my-3" />')
            ->assertSee('progress my-3', false);
    }
}
