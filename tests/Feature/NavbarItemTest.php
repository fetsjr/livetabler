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

    public function test_atajo_badge_usa_badge_inline_de_tabler(): void
    {
        // El atajo 'badge' del item debe emitir un badge INLINE al estilo oficial de
        // Tabler ('badge badge-sm bg-{color} text-{color}-fg'), NO 'badge-notification'
        // (absoluto), que se ancla mal porque .nav-link no es position:relative.
        $html = $this->blade('<x-tabler::navbar.item href="/x" badge="3" badgeColor="green">Mensajes</x-tabler::navbar.item>');
        $html->assertSee('badge badge-sm bg-green text-green-fg', false)
            ->assertDontSee('badge-notification', false)
            ->assertSee('3');
    }

    public function test_atajo_badge_dentro_del_nav_link(): void
    {
        // El badge inline debe quedar DENTRO del <a class="nav-link"> del item.
        $html = (string) $this->blade('<x-tabler::navbar.item href="/x" badge="5">M</x-tabler::navbar.item>');

        $posLink = strpos($html, 'class="nav-link"');
        $posBadge = strpos($html, 'badge badge-sm');
        $posCierre = strpos($html, '</a>');

        $this->assertNotFalse($posLink);
        $this->assertNotFalse($posBadge);
        $this->assertTrue($posBadge > $posLink && $posBadge < $posCierre, 'El badge debe ir dentro del nav-link.');
    }

    public function test_atajo_badge_tiene_etiqueta_accesible(): void
    {
        // El contador debe llevar contexto accesible (visually-hidden) para lectores de pantalla.
        $this->blade('<x-tabler::navbar.item href="/x" badge="3">M</x-tabler::navbar.item>')
            ->assertSee('visually-hidden', false);
    }

    public function test_badge_empareja_color_con_text_bg(): void
    {
        // navbar.badge debe fijar fondo Y texto via 'text-bg-{color}', no solo 'bg-{color}'.
        $this->blade('<x-tabler::navbar.badge color="red">5</x-tabler::navbar.badge>')
            ->assertSee('text-bg-red', false)
            ->assertSee('5');
    }

    public function test_badge_fusiona_clases_del_consumidor(): void
    {
        // navbar.badge tiene clase de raiz: la clase del consumidor va CONTIGUA tras la
        // ultima clase computada ('text-bg-red').
        $this->blade('<x-tabler::navbar.badge class="ms-auto">5</x-tabler::navbar.badge>')
            ->assertSee('text-bg-red ms-auto', false);
    }

    public function test_badge_dot_no_muestra_contenido(): void
    {
        // En modo 'dot' el badge no vuelca el slot (solo el punto).
        $this->blade('<x-tabler::navbar.badge :dot="true">99</x-tabler::navbar.badge>')
            ->assertDontSee('99');
    }

    public function test_badge_blink_anade_clase(): void
    {
        $this->blade('<x-tabler::navbar.badge :blink="true">!</x-tabler::navbar.badge>')
            ->assertSee('badge-blink', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        // La clase del consumidor ('text-uppercase') se fusiona en el ÚNICO atributo class
        // del <li> raíz, contigua a la última clase computada ('nav-item').
        $this->blade('<x-tabler::navbar.item class="text-uppercase">x</x-tabler::navbar.item>')
            ->assertSee('nav-item text-uppercase', false);
    }
}
