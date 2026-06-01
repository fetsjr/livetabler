<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class TabsTest extends TestCase
{
    // --- Contenedor: <x-tabler::tabs> ---

    public function test_declara_estado_alpine_con_default(): void
    {
        $this->blade('<x-tabler::tabs default="home">x</x-tabler::tabs>')
            ->assertSee('x-data="{ activeTab: \'home\' }"', false);
    }

    public function test_sin_default_inicializa_en_null(): void
    {
        $this->blade('<x-tabler::tabs>x</x-tabler::tabs>')
            ->assertSee('x-data="{ activeTab: null }"', false);
    }

    public function test_renderiza_el_slot(): void
    {
        $this->blade('<x-tabler::tabs default="a">CONTENIDO</x-tabler::tabs>')
            ->assertSee('CONTENIDO');
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::tabs class="mb-3">x</x-tabler::tabs>')
            ->assertSee('w-100 mb-3', false);
    }

    // --- Barra de pestañas: <x-tabler::tab.group> ---

    public function test_group_clases_base(): void
    {
        $this->blade('<x-tabler::tab.group>x</x-tabler::tab.group>')
            ->assertSee('nav nav-tabs', false)
            ->assertSee('role="tablist"', false);
    }

    public function test_group_no_usa_bootstrap_toggle(): void
    {
        $this->blade('<x-tabler::tab.group>x</x-tabler::tab.group>')
            ->assertDontSee('data-bs-toggle', false);
    }

    public function test_group_fill_anade_clase(): void
    {
        $this->blade('<x-tabler::tab.group :fill="true">x</x-tabler::tab.group>')
            ->assertSee('nav-fill', false);
    }

    public function test_group_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::tab.group class="card-header-tabs">x</x-tabler::tab.group>')
            ->assertSee('nav-tabs card-header-tabs', false);
    }

    // --- Pestaña: <x-tabler::tab name="..."> ---

    public function test_tab_estructura_base(): void
    {
        $this->blade('<x-tabler::tab name="home">Inicio</x-tabler::tab>')
            ->assertSee('nav-item', false)
            ->assertSee('nav-link', false)
            ->assertSee('Inicio');
    }

    public function test_tab_enlaza_con_alpine_por_name(): void
    {
        $this->blade('<x-tabler::tab name="home">Inicio</x-tabler::tab>')
            ->assertSee("activeTab = 'home'", false)
            ->assertSee("activeTab === 'home'", false);
    }

    public function test_tab_es_accesible(): void
    {
        $this->blade('<x-tabler::tab name="home">Inicio</x-tabler::tab>')
            ->assertSee('role="tab"', false)
            ->assertSee(':aria-selected', false);
    }

    public function test_tab_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::tab name="home" class="ms-auto">Inicio</x-tabler::tab>')
            ->assertSee('nav-item ms-auto', false);
    }

    // --- Panel: <x-tabler::tab.panel name="..."> ---

    public function test_panel_estructura_base(): void
    {
        $this->blade('<x-tabler::tab.panel name="home">Cuerpo</x-tabler::tab.panel>')
            ->assertSee('tab-pane', false)
            ->assertSee('role="tabpanel"', false)
            ->assertSee('Cuerpo');
    }

    public function test_panel_visibilidad_por_alpine(): void
    {
        $this->blade('<x-tabler::tab.panel name="home">Cuerpo</x-tabler::tab.panel>')
            ->assertSee("x-show=\"activeTab === 'home'\"", false)
            ->assertSee("'active show': activeTab === 'home'", false);
    }

    public function test_panel_es_accesible(): void
    {
        $this->blade('<x-tabler::tab.panel name="home">Cuerpo</x-tabler::tab.panel>')
            ->assertSee(':aria-hidden', false);
    }

    public function test_panel_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::tab.panel name="home" class="p-3">Cuerpo</x-tabler::tab.panel>')
            ->assertSee('tab-pane p-3', false);
    }

    // --- Contenedor de paneles: <x-tabler::tab.panels> ---

    public function test_panels_clase_base(): void
    {
        $this->blade('<x-tabler::tab.panels>x</x-tabler::tab.panels>')
            ->assertSee('tab-content', false);
    }

    public function test_panels_renderiza_el_slot(): void
    {
        $this->blade('<x-tabler::tab.panels>INTERIOR</x-tabler::tab.panels>')
            ->assertSee('INTERIOR');
    }

    public function test_panels_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::tab.panels class="card-body">x</x-tabler::tab.panels>')
            ->assertSee('tab-content card-body', false);
    }
}
