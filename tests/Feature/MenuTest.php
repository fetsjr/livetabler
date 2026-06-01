<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class MenuTest extends TestCase
{
    // ----------------------------------------------------------------------
    // menu (index)
    // ----------------------------------------------------------------------

    public function test_renderiza_dropdown_menu_base(): void
    {
        $this->blade('<x-tabler::menu>X</x-tabler::menu>')
            ->assertSee('dropdown-menu', false);
    }

    public function test_menu_alineacion_end(): void
    {
        $this->blade('<x-tabler::menu :end="true">X</x-tabler::menu>')
            ->assertSee('dropdown-menu-end', false);
    }

    public function test_menu_flecha_y_tema_oscuro(): void
    {
        $this->blade('<x-tabler::menu :arrow="true" :dark="true">X</x-tabler::menu>')
            ->assertSee('dropdown-menu-arrow', false)
            ->assertSee('data-bs-theme="dark"', false);
    }

    public function test_menu_muestra_show(): void
    {
        $this->blade('<x-tabler::menu :show="true">X</x-tabler::menu>')
            ->assertSee('show', false);
    }

    public function test_menu_fusiona_clases_del_consumidor(): void
    {
        // Subcadena CONTIGUA: ultima clase computada 'dropdown-menu' + clase del consumidor.
        $this->blade('<x-tabler::menu class="w-100">X</x-tabler::menu>')
            ->assertSee('dropdown-menu w-100', false);
    }

    // ----------------------------------------------------------------------
    // menu.item
    // ----------------------------------------------------------------------

    public function test_item_base_es_boton(): void
    {
        $html = $this->blade('<x-tabler::menu.item>Accion</x-tabler::menu.item>')->__toString();

        $this->assertStringContainsString('<button', $html);
        $this->assertStringContainsString('dropdown-item', $html);
        $this->assertStringContainsString('type="button"', $html);
    }

    public function test_item_con_href_es_enlace(): void
    {
        $html = $this->blade('<x-tabler::menu.item href="/perfil">Perfil</x-tabler::menu.item>')->__toString();

        $this->assertStringContainsString('<a', $html);
        $this->assertStringContainsString('href="/perfil"', $html);
    }

    public function test_item_con_icono(): void
    {
        $this->blade('<x-tabler::menu.item icon="settings">Ajustes</x-tabler::menu.item>')
            ->assertSee('dropdown-item-icon', false)
            ->assertSee('ti-settings', false);
    }

    public function test_item_estados_active_disabled_danger(): void
    {
        $this->blade('<x-tabler::menu.item :active="true" :danger="true">X</x-tabler::menu.item>')
            ->assertSee('dropdown-item active', false)
            ->assertSee('text-danger', false);
    }

    public function test_item_enlace_disabled_es_accesible(): void
    {
        $this->blade('<x-tabler::menu.item href="/x" :disabled="true">X</x-tabler::menu.item>')
            ->assertSee('aria-disabled="true"', false)
            ->assertSee('tabindex="-1"', false);
    }

    public function test_item_boton_disabled_nativo(): void
    {
        $this->blade('<x-tabler::menu.item :disabled="true">X</x-tabler::menu.item>')
            ->assertSee('disabled', false);
    }

    public function test_item_con_shortcut(): void
    {
        $this->blade('<x-tabler::menu.item shortcut="K">X</x-tabler::menu.item>')
            ->assertSee('K', false);
    }

    public function test_item_fusiona_clases_del_consumidor(): void
    {
        // Subcadena CONTIGUA: 'dropdown-item' (ultima clase base) + clase del consumidor.
        $this->blade('<x-tabler::menu.item class="fw-bold">X</x-tabler::menu.item>')
            ->assertSee('dropdown-item fw-bold', false);
    }

    // ----------------------------------------------------------------------
    // menu.group
    // ----------------------------------------------------------------------

    public function test_grupo_con_heading_renderiza_dropdown_header(): void
    {
        $this->blade('<x-tabler::menu.group heading="Cuenta"><span>x</span></x-tabler::menu.group>')
            ->assertSee('dropdown-header', false)
            ->assertSee('Cuenta');
    }

    public function test_grupo_sin_heading_es_transparente(): void
    {
        $html = $this->blade('<x-tabler::menu.group><span>contenido</span></x-tabler::menu.group>')->__toString();

        $this->assertStringNotContainsString('dropdown-header', $html);
        $this->assertStringContainsString('contenido', $html);
    }

    public function test_grupo_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::menu.group heading="X" class="text-uppercase">y</x-tabler::menu.group>')
            ->assertSee('dropdown-header text-uppercase', false);
    }

    // ----------------------------------------------------------------------
    // menu.heading
    // ----------------------------------------------------------------------

    public function test_heading_usa_dropdown_header(): void
    {
        $this->blade('<x-tabler::menu.heading>Ajustes</x-tabler::menu.heading>')
            ->assertSee('dropdown-header', false)
            ->assertSee('Ajustes');
    }

    public function test_heading_es_h6(): void
    {
        $html = $this->blade('<x-tabler::menu.heading>X</x-tabler::menu.heading>')->__toString();
        $this->assertStringContainsString('<h6', $html);
    }

    public function test_heading_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::menu.heading class="text-primary">X</x-tabler::menu.heading>')
            ->assertSee('dropdown-header text-primary', false);
    }

    // ----------------------------------------------------------------------
    // menu.separator
    // ----------------------------------------------------------------------

    public function test_separator_usa_dropdown_divider(): void
    {
        $this->blade('<x-tabler::menu.separator />')
            ->assertSee('dropdown-divider', false);
    }

    public function test_separator_tiene_role_separator(): void
    {
        $this->blade('<x-tabler::menu.separator />')
            ->assertSee('role="separator"', false);
    }

    public function test_separator_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::menu.separator class="my-3" />')
            ->assertSee('dropdown-divider my-3', false);
    }

    // ----------------------------------------------------------------------
    // menu.submenu
    // ----------------------------------------------------------------------

    public function test_submenu_tiene_estado_alpine(): void
    {
        $this->blade('<x-tabler::menu.submenu heading="Mas"><span>x</span></x-tabler::menu.submenu>')
            ->assertSee('x-data', false)
            ->assertSee('abierto', false);
    }

    public function test_submenu_disparador_es_dropdown_item(): void
    {
        $this->blade('<x-tabler::menu.submenu heading="Mas"><span>x</span></x-tabler::menu.submenu>')
            ->assertSee('dropdown-item', false)
            ->assertSee('Mas');
    }

    public function test_submenu_hijo_reusa_dropdown_menu_posicionado(): void
    {
        $this->blade('<x-tabler::menu.submenu heading="Mas"><span>x</span></x-tabler::menu.submenu>')
            ->assertSee('dropdown-menu position-absolute top-0 start-100', false);
    }

    public function test_submenu_no_usa_sintaxis_tabler_dos_puntos(): void
    {
        // Regresion del bug original <tabler:menu.item>.
        $html = $this->blade('<x-tabler::menu.submenu heading="Mas"><span>x</span></x-tabler::menu.submenu>')->__toString();
        $this->assertStringNotContainsString('<tabler:', $html);
    }

    public function test_submenu_fusiona_clases_del_consumidor(): void
    {
        // Subcadena CONTIGUA: ultima clase base 'position-relative' + clase del consumidor.
        $this->blade('<x-tabler::menu.submenu heading="X" class="my-1">y</x-tabler::menu.submenu>')
            ->assertSee('position-relative my-1', false);
    }
}
