<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class AvatarTest extends TestCase
{
    public function test_clase_base(): void
    {
        $this->blade('<x-tabler::avatar>JD</x-tabler::avatar>')
            ->assertSee('avatar', false);
    }

    public function test_tamano_lg(): void
    {
        $this->blade('<x-tabler::avatar size="lg">JD</x-tabler::avatar>')
            ->assertSee('avatar-lg', false);
    }

    public function test_forma_circle(): void
    {
        $this->blade('<x-tabler::avatar shape="circle">JD</x-tabler::avatar>')
            ->assertSee('rounded-circle', false);
    }

    public function test_color_de_fondo(): void
    {
        $this->blade('<x-tabler::avatar color="blue">JD</x-tabler::avatar>')
            ->assertSee('bg-blue-lt', false);
    }

    public function test_iniciales(): void
    {
        $this->blade('<x-tabler::avatar initials="JD" />')
            ->assertSee('JD', false);
    }

    public function test_imagen_de_fondo(): void
    {
        $html = $this->blade('<x-tabler::avatar src="/a.png" />')->__toString();
        $this->assertStringContainsString('background-image', $html);
        $this->assertStringContainsString('/a.png', $html);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::avatar class="me-2">JD</x-tabler::avatar>')
            ->assertSee('avatar me-2', false);
    }
}
