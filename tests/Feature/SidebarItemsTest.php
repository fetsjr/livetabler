<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class SidebarItemsTest extends TestCase
{
    // ----------------------------------------------------------------- item

    public function test_item_renderiza_li_nav_item_con_enlace(): void
    {
        $this->blade('<x-tabler::sidebar.item href="/inicio">Inicio</x-tabler::sidebar.item>')
            ->assertSee('<li', false)->assertSee('nav-item', false)
            ->assertSee('nav-link', false)->assertSee('href="/inicio"', false)
            ->assertSee('nav-link-title', false)->assertSee('Inicio');
    }

    public function test_item_active_va_en_el_li_no_en_el_a(): void
    {
        $html = $this->blade('<x-tabler::sidebar.item :current="true">X</x-tabler::sidebar.item>')->__toString();
        $this->assertStringContainsString('nav-item active', $html);
        $this->assertStringContainsString('aria-current="page"', $html);
    }

    public function test_item_icono_y_badge(): void
    {
        $this->blade('<x-tabler::sidebar.item icon="home" badge="3" badgeColor="green">X</x-tabler::sidebar.item>')
            ->assertSee('nav-link-icon', false)->assertSee('ti-home', false)
            ->assertSee('badge badge-sm bg-green text-green-fg ms-auto', false)->assertSee('3');
    }

    public function test_item_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::sidebar.item :current="true" class="mb-2">X</x-tabler::sidebar.item>')
            ->assertSee('nav-item active mb-2', false);
    }

    public function test_item_disabled_anade_clase(): void
    {
        $this->blade('<x-tabler::sidebar.item href="/x" :disabled="true">X</x-tabler::sidebar.item>')
            ->assertSee('nav-link disabled', false);
    }

    public function test_item_sin_href_no_emite_atributo_href(): void
    {
        $this->blade('<x-tabler::sidebar.item>X</x-tabler::sidebar.item>')
            ->assertDontSee('href=', false);
    }

    public function test_item_badge_color_por_defecto(): void
    {
        // Sin badgeColor explicito, el color por defecto es 'red' (bg-red text-red-fg).
        $this->blade('<x-tabler::sidebar.item badge="9">X</x-tabler::sidebar.item>')
            ->assertSee('bg-red text-red-fg', false);
    }

    // ---------------------------------------------------------------- group

    public function test_group_renderiza_li_con_sublista(): void
    {
        $this->blade('<x-tabler::sidebar.group><li class="nav-item">A</li></x-tabler::sidebar.group>')
            ->assertSee('<li', false)->assertSee('navbar-nav', false)->assertSee('A');
    }

    public function test_group_muestra_heading_con_clases_tabler(): void
    {
        $this->blade('<x-tabler::sidebar.group heading="Admin">x</x-tabler::sidebar.group>')
            ->assertSee('hr-text hr-text-left text-uppercase text-secondary px-3', false)
            ->assertSee('Admin');
    }

    public function test_group_sin_heading_no_pinta_subtitulo(): void
    {
        $this->blade('<x-tabler::sidebar.group>x</x-tabler::sidebar.group>')
            ->assertDontSee('hr-text', false);
    }

    public function test_group_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::sidebar.group class="pb-2">x</x-tabler::sidebar.group>')
            ->assertSee('mt-3 pb-2', false);
    }

    // --------------------------------------------------------------- header

    public function test_header_usa_flex_de_bootstrap_no_tailwind(): void
    {
        $this->blade('<x-tabler::sidebar.header>x</x-tabler::sidebar.header>')
            ->assertSee('d-flex align-items-center justify-content-between', false)
            ->assertDontSee('flex items-center', false);
    }

    public function test_header_renderiza_slot(): void
    {
        $this->blade('<x-tabler::sidebar.header>Hola</x-tabler::sidebar.header>')->assertSee('Hola');
    }

    public function test_header_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::sidebar.header class="border-bottom">x</x-tabler::sidebar.header>')
            ->assertSee('px-3 py-3 border-bottom', false);
    }

    // ------------------------------------------------------------------ nav

    public function test_nav_es_ul_navbar_nav(): void
    {
        $this->blade('<x-tabler::sidebar.nav>x</x-tabler::sidebar.nav>')
            ->assertSee('<ul', false)->assertSee('navbar-nav', false);
    }

    public function test_nav_no_usa_tailwind(): void
    {
        $this->blade('<x-tabler::sidebar.nav>x</x-tabler::sidebar.nav>')
            ->assertDontSee('flex-column gap-1', false);
    }

    public function test_nav_renderiza_items_del_slot(): void
    {
        $this->blade('<x-tabler::sidebar.nav><li class="nav-item">A</li></x-tabler::sidebar.nav>')->assertSee('A');
    }

    public function test_nav_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::sidebar.nav class="pt-lg-3">x</x-tabler::sidebar.nav>')
            ->assertSee('navbar-nav pt-lg-3', false);
    }

    // --------------------------------------------------------------- spacer

    public function test_spacer_usa_mt_auto_no_tailwind(): void
    {
        $this->blade('<x-tabler::sidebar.spacer />')
            ->assertSee('mt-auto', false)->assertDontSee('flex-1', false);
    }

    public function test_spacer_es_div_vacio(): void
    {
        $this->blade('<x-tabler::sidebar.spacer />')->assertSee('<div', false);
    }

    public function test_spacer_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::sidebar.spacer class="border-top" />')
            ->assertSee('mt-auto border-top', false);
    }

    // ----------------------------------------------------------------- brand

    public function test_brand_es_a_navbar_brand(): void
    {
        $this->blade('<x-tabler::sidebar.brand>Tabler</x-tabler::sidebar.brand>')
            ->assertSee('navbar-brand navbar-brand-autodark', false)
            ->assertSee('href="/"', false)->assertSee('Tabler');
    }

    public function test_brand_logo_renderiza_imagen(): void
    {
        $this->blade('<x-tabler::sidebar.brand logo="/logo.svg" />')
            ->assertSee('<img', false)->assertSee('/logo.svg', false)
            ->assertSee('navbar-brand-image', false);
    }

    public function test_brand_href_personalizado(): void
    {
        $this->blade('<x-tabler::sidebar.brand href="/panel">X</x-tabler::sidebar.brand>')
            ->assertSee('href="/panel"', false);
    }

    public function test_brand_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::sidebar.brand class="mb-3">X</x-tabler::sidebar.brand>')
            ->assertSee('navbar-brand-autodark mb-3', false);
    }

    // --------------------------------------------------------------- profile

    public function test_profile_avatar_con_imagen(): void
    {
        $this->blade('<x-tabler::sidebar.profile name="Pawel" avatar="/a.jpg" />')
            ->assertSee('avatar avatar-sm', false)
            ->assertSee('background-image: url(/a.jpg)', false);
    }

    public function test_profile_avatar_inicial_sin_imagen(): void
    {
        $this->blade('<x-tabler::sidebar.profile name="pawel" />')
            ->assertSee('avatar avatar-sm bg-blue-lt', false)->assertSee('P');
    }

    public function test_profile_email_secundario_con_clases_tabler(): void
    {
        $this->blade('<x-tabler::sidebar.profile name="X" email="UI Designer" />')
            ->assertSee('mt-1 small text-secondary', false)->assertSee('UI Designer');
    }

    public function test_profile_no_usa_tailwind(): void
    {
        $this->blade('<x-tabler::sidebar.profile name="X" />')
            ->assertDontSee('flex-column', false)->assertDontSee('lh-1', false);
    }

    public function test_profile_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::sidebar.profile name="X" class="mt-auto" />')
            ->assertSee('px-3 py-2 mt-auto', false);
    }

    // ---------------------------------------------------------------- search

    public function test_search_estructura_input_icon(): void
    {
        $this->blade('<x-tabler::sidebar.search />')
            ->assertSee('input-icon', false)->assertSee('input-icon-addon', false)
            ->assertSee('form-control', false)->assertSee('type="search"', false);
    }

    public function test_search_placeholder_personalizado(): void
    {
        $this->blade('<x-tabler::sidebar.search placeholder="Buscar..." />')
            ->assertSee('placeholder="Buscar..."', false);
    }

    public function test_search_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::sidebar.search class="border-bottom" />')
            ->assertSee('px-3 py-2 border-bottom', false);
    }

    // -------------------------------------------------------------- collapse

    public function test_collapse_es_nav_item_dropdown(): void
    {
        $this->blade('<x-tabler::sidebar.collapse heading="Productos" id="m1">x</x-tabler::sidebar.collapse>')
            ->assertSee('nav-item dropdown', false)
            ->assertSee('dropdown-toggle', false)
            ->assertSee('data-bs-toggle="dropdown"', false)
            ->assertSee('Productos');
    }

    public function test_collapse_open_aplica_show_y_aria(): void
    {
        $this->blade('<x-tabler::sidebar.collapse heading="X" id="m2" :open="true">y</x-tabler::sidebar.collapse>')
            ->assertSee('dropdown-toggle show', false)
            ->assertSee('aria-expanded="true"', false)
            ->assertSee('dropdown-menu show', false);
    }

    public function test_collapse_icono_y_aria_por_id(): void
    {
        // El dropdown de Tabler se acopla por DOM (padre .dropdown / hermano .dropdown-menu),
        // NO por ancla: el href es un placeholder. El id solo enlaza aria-controls.
        $this->blade('<x-tabler::sidebar.collapse heading="X" icon="package" id="menu-x">y</x-tabler::sidebar.collapse>')
            ->assertSee('ti-package', false)
            ->assertSee('href="#"', false)
            ->assertSee('aria-controls="menu-x"', false)
            ->assertSee('id="menu-x"', false)
            ->assertDontSee('href="#menu-x"', false);
    }

    public function test_collapse_keep_open_por_defecto_es_outside(): void
    {
        // Por defecto Tabler usa data-bs-auto-close="outside" (autocierra al hacer clic fuera).
        $this->blade('<x-tabler::sidebar.collapse heading="X" id="m-ac">y</x-tabler::sidebar.collapse>')
            ->assertSee('data-bs-auto-close="outside"', false);
    }

    public function test_collapse_keep_open_fija_auto_close_false(): void
    {
        // keepOpen=true desactiva el autocierre (data-bs-auto-close="false").
        $this->blade('<x-tabler::sidebar.collapse heading="X" id="m-ko" :keep-open="true">y</x-tabler::sidebar.collapse>')
            ->assertSee('data-bs-auto-close="false"', false);
    }

    public function test_collapse_sin_id_genera_toggle_coherente(): void
    {
        // Sin id explicito el id se deriva del heading (estable, no aleatorio) y el href
        // permanece como placeholder; el trigger sigue referenciando el menu via aria-controls.
        $html = $this->blade('<x-tabler::sidebar.collapse heading="Mis Productos">y</x-tabler::sidebar.collapse>')->__toString();
        $this->assertStringContainsString('href="#"', $html);
        $this->assertStringContainsString('id="sidebar-submenu-mis-productos"', $html);
        $this->assertStringContainsString('aria-controls="sidebar-submenu-mis-productos"', $html);
    }

    public function test_collapse_no_usa_alpine_ni_tailwind(): void
    {
        $this->blade('<x-tabler::sidebar.collapse heading="X" id="m3">y</x-tabler::sidebar.collapse>')
            ->assertDontSee('x-collapse', false)
            ->assertDontSee('rotate-180', false)
            ->assertDontSee('flex-column', false);
    }

    public function test_collapse_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::sidebar.collapse heading="X" id="m4" class="mt-2">y</x-tabler::sidebar.collapse>')
            ->assertSee('nav-item dropdown mt-2', false);
    }

    // ---------------------------------------------------------------- toggle

    public function test_toggle_usa_bootstrap_collapse_no_alpine(): void
    {
        $this->blade('<x-tabler::sidebar.toggle />')
            ->assertSee('navbar-toggler', false)
            ->assertSee('data-bs-toggle="collapse"', false)
            ->assertSee('data-bs-target="#sidebar-menu"', false)
            ->assertDontSee('$store.sidebar', false);
    }

    public function test_toggle_target_personalizado(): void
    {
        $this->blade('<x-tabler::sidebar.toggle target="otro-menu" />')
            ->assertSee('data-bs-target="#otro-menu"', false)
            ->assertSee('aria-controls="otro-menu"', false);
    }

    public function test_toggle_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::sidebar.toggle class="d-lg-none" />')
            ->assertSee('navbar-toggler d-lg-none', false);
    }
}
