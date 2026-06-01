<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class NavmenuTest extends TestCase
{
    // --- index ---

    public function test_clase_base_dropdown_menu(): void
    {
        $this->blade('<x-tabler::navmenu>Items</x-tabler::navmenu>')
            ->assertSee('dropdown-menu', false)
            ->assertSee('Items', false);
    }

    public function test_no_fuerza_show_por_defecto(): void
    {
        // El menú no debe nacer abierto; Bootstrap gestiona 'show'.
        $this->blade('<x-tabler::navmenu>Items</x-tabler::navmenu>')
            ->assertDontSee('dropdown-menu show', false);
    }

    public function test_align_end_anade_clase(): void
    {
        $this->blade('<x-tabler::navmenu align="end">Items</x-tabler::navmenu>')
            ->assertSee('dropdown-menu-end', false);
    }

    public function test_arrow_anade_clase(): void
    {
        $this->blade('<x-tabler::navmenu :arrow="true">Items</x-tabler::navmenu>')
            ->assertSee('dropdown-menu-arrow', false);
    }

    public function test_index_fusiona_clases_del_consumidor(): void
    {
        // La clase del consumidor va contigua tras la última clase computada
        // (base, align=start => solo 'dropdown-menu').
        $this->blade('<x-tabler::navmenu class="shadow">Items</x-tabler::navmenu>')
            ->assertSee('dropdown-menu shadow', false);
    }

    // --- item ---

    public function test_clase_base_dropdown_item(): void
    {
        $this->blade('<x-tabler::navmenu.item href="/perfil">Perfil</x-tabler::navmenu.item>')
            ->assertSee('dropdown-item', false)
            ->assertSee('href="/perfil"', false)
            ->assertSee('Perfil', false);
    }

    public function test_sin_href_renderiza_button(): void
    {
        $this->blade('<x-tabler::navmenu.item>Salir</x-tabler::navmenu.item>')
            ->assertSee('<button', false)
            ->assertSee('type="button"', false);
    }

    public function test_active_anade_clase(): void
    {
        $this->blade('<x-tabler::navmenu.item href="#" :active="true">Hoy</x-tabler::navmenu.item>')
            ->assertSee('dropdown-item active', false);
    }

    public function test_icono_usa_clase_dropdown_item_icon(): void
    {
        $this->blade('<x-tabler::navmenu.item href="#" icon="settings">Ajustes</x-tabler::navmenu.item>')
            ->assertSee('dropdown-item-icon', false)
            ->assertSee('ti-settings', false);
    }

    public function test_item_fusiona_clases_del_consumidor(): void
    {
        // Sin active/disabled la única clase computada es 'dropdown-item'; el consumidor va contiguo.
        $this->blade('<x-tabler::navmenu.item href="#" class="text-danger">Borrar</x-tabler::navmenu.item>')
            ->assertSee('dropdown-item text-danger', false);
    }

    // --- separator ---

    public function test_clase_base_dropdown_divider(): void
    {
        $this->blade('<x-tabler::navmenu.separator />')
            ->assertSee('dropdown-divider', false);
    }

    public function test_no_usa_cruft_border_top(): void
    {
        // Regresión: el stub antiguo usaba 'my-1 border-top' en vez de la clase de Tabler.
        $this->blade('<x-tabler::navmenu.separator />')
            ->assertDontSee('border-top', false);
    }

    public function test_separator_fusiona_clases_del_consumidor(): void
    {
        // Única clase computada 'dropdown-divider'; la del consumidor va contigua.
        $this->blade('<x-tabler::navmenu.separator class="my-3" />')
            ->assertSee('dropdown-divider my-3', false);
    }
}
