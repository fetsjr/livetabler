<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class NavbarBadgeTest extends TestCase
{
    public function test_badge_notificacion_por_defecto_rojo(): void
    {
        $this->blade('<x-tabler::navbar.badge>5</x-tabler::navbar.badge>')
            ->assertSee('badge', false)
            ->assertSee('badge-notification', false)
            ->assertSee('bg-red', false)
            ->assertSee('5');
    }

    public function test_color_personalizado(): void
    {
        $this->blade('<x-tabler::navbar.badge color="green">2</x-tabler::navbar.badge>')
            ->assertSee('bg-green', false);
    }

    public function test_modo_dot_no_muestra_contenido(): void
    {
        $this->blade('<x-tabler::navbar.badge :dot="true">99</x-tabler::navbar.badge>')
            ->assertSee('badge-notification', false)
            ->assertDontSee('99');
    }

    public function test_blink_anade_clase(): void
    {
        $this->blade('<x-tabler::navbar.badge :blink="true">!</x-tabler::navbar.badge>')
            ->assertSee('badge-blink', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        // La clase del consumidor ('ms-2') se fusiona en el ÚNICO atributo class,
        // contigua a la última clase computada ('bg-red').
        $this->blade('<x-tabler::navbar.badge class="ms-2">1</x-tabler::navbar.badge>')
            ->assertSee('bg-red ms-2', false);
    }
}
