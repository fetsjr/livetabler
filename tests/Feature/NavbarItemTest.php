<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class NavbarItemTest extends TestCase
{
    public function test_estructura_basica_nav_item(): void
    {
        $this->blade('<x-tabler::navbar.item href="/panel">Inicio</x-tabler::navbar.item>')
            ->assertSee('<li', false)
            ->assertSee('nav-item', false)
            ->assertSee('class="nav-link"', false)
            ->assertSee('href="/panel"', false)
            ->assertSee('nav-link-title', false)
            ->assertSee('Inicio');
    }

    public function test_item_activo_anade_clase_y_aria(): void
    {
        $this->blade('<x-tabler::navbar.item :active="true" href="/x">Activo</x-tabler::navbar.item>')
            ->assertSee('nav-item active', false)
            ->assertSee('aria-current="page"', false);
    }

    public function test_icono_se_envuelve_en_nav_link_icon(): void
    {
        $this->blade('<x-tabler::navbar.item icon="home" href="/x">Inicio</x-tabler::navbar.item>')
            ->assertSee('nav-link-icon', false)
            ->assertSee('ti-home', false);
    }

    public function test_atajo_badge_renderiza_navbar_badge(): void
    {
        $this->blade('<x-tabler::navbar.item href="/x" badge="3" badgeColor="green">Mensajes</x-tabler::navbar.item>')
            ->assertSee('badge', false)
            ->assertSee('badge-notification', false)
            ->assertSee('bg-green', false)
            ->assertSee('3');
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        // La clase del consumidor ('text-uppercase') se fusiona en el ÚNICO atributo class
        // del <li> raíz, contigua a la última clase computada ('nav-item').
        $this->blade('<x-tabler::navbar.item class="text-uppercase">x</x-tabler::navbar.item>')
            ->assertSee('nav-item text-uppercase', false);
    }
}
