<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class StatusTest extends TestCase
{
    public function test_clases_base(): void
    {
        $this->blade('<x-tabler::status />')
            ->assertSee('status-dot status-primary', false);
    }

    public function test_color(): void
    {
        $this->blade('<x-tabler::status color="green" />')
            ->assertSee('status-green', false);
    }

    public function test_animated(): void
    {
        $this->blade('<x-tabler::status :animated="true" />')
            ->assertSee('status-dot-animated', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::status color="primary" class="ms-1" />')
            ->assertSee('status-primary ms-1', false);
    }
}
