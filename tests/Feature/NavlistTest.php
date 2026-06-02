<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class NavlistTest extends TestCase
{
    // --- index ---

    public function test_estructura_basica(): void
    {
        $this->blade('<x-tabler::navlist>x</x-tabler::navlist>')
            ->assertSee('<ul', false)
            ->assertSee('navbar-nav', false)
            ->assertSee('aria-label="Sidebar"', false);
    }

    public function test_label_personalizado(): void
    {
        $this->blade('<x-tabler::navlist label="Menú principal">x</x-tabler::navlist>')
            ->assertSee('aria-label="Menú principal"', false);
    }

    public function test_renderiza_contenido_del_slot(): void
    {
        $this->blade('<x-tabler::navlist><li class="nav-item">Inicio</li></x-tabler::navlist>')
            ->assertSee('Inicio');
    }

    public function test_index_fusiona_clases_del_consumidor(): void
    {
        // Subcadena CONTIGUA: la última clase base ('navbar-nav') queda inmediatamente
        // seguida de la clase del consumidor ('mt-3'), en el ÚNICO atributo class del <ul>.
        $this->blade('<x-tabler::navlist class="mt-3">x</x-tabler::navlist>')
            ->assertSee('navbar-nav mt-3', false);
    }

    // --- item ---

    public function test_renderiza_como_enlace_con_href(): void
    {
        $this->blade('<x-tabler::navlist.item href="/inicio">Inicio</x-tabler::navlist.item>')
            ->assertSee('<li', false)
            ->assertSee('nav-item', false)
            ->assertSee('href="/inicio"', false)
            ->assertSee('nav-link', false)
            ->assertSee('nav-link-title', false)
            ->assertSee('Inicio');
    }

    public function test_sin_href_renderiza_boton(): void
    {
        $this->blade('<x-tabler::navlist.item>Acción</x-tabler::navlist.item>')
            ->assertSee('type="button"', false);
    }

    public function test_activo_marca_li_y_aria_current(): void
    {
        // "active" debe aparecer en el <li class="nav-item active"> y aria-current en el enlace.
        $this->blade('<x-tabler::navlist.item href="/x" :active="true">X</x-tabler::navlist.item>')
            ->assertSee('nav-item active', false)
            ->assertSee('aria-current="page"', false);
    }

    public function test_activo_no_duplica_active_en_nav_link(): void
    {
        // Patron canonico de Tabler: 'active' vive solo en el li.nav-item; el enlace
        // lleva aria-current="page", NO la clase 'active' (no se duplica).
        $this->blade('<x-tabler::navlist.item href="/x" :active="true">X</x-tabler::navlist.item>')
            ->assertDontSee('nav-link active', false)
            ->assertSee('class="nav-link"', false);
    }

    public function test_icono_y_badge(): void
    {
        $this->blade('<x-tabler::navlist.item href="/x" icon="home" badge="3">X</x-tabler::navlist.item>')
            ->assertSee('nav-link-icon', false)
            ->assertSee('ti-home', false)
            ->assertSee('badge', false)
            ->assertSee('3');
    }

    public function test_item_fusiona_clases_del_consumidor(): void
    {
        // Subcadena CONTIGUA en el <li> raíz: 'nav-item' seguido de la clase del consumidor.
        $this->blade('<x-tabler::navlist.item href="/x" class="mb-1">X</x-tabler::navlist.item>')
            ->assertSee('nav-item mb-1', false);
    }

    // --- group ---

    public function test_encabezado_se_renderiza(): void
    {
        $this->blade('<x-tabler::navlist.group heading="Administración">x</x-tabler::navlist.group>')
            ->assertSee('<li', false)
            ->assertSee('text-uppercase', false)
            ->assertSee('text-muted', false)
            ->assertSee('Administración');
    }

    public function test_sin_heading_no_aplica_estilos_de_encabezado(): void
    {
        // Sin heading no debe haber estilos de encabezado (text-uppercase), pero
        // si una raiz contenedora que emite el contenido del slot.
        $this->blade('<x-tabler::navlist.group><li class="nav-item">Item</li></x-tabler::navlist.group>')
            ->assertSee('Item')
            ->assertDontSee('text-uppercase', false);
    }

    public function test_group_sin_heading_fusiona_clases_del_consumidor(): void
    {
        // El grupo SIEMPRE tiene una raiz que absorbe los atributos del consumidor,
        // tambien sin heading: la clase 'mb-0' debe aparecer en la raiz (no se descarta).
        $this->blade('<x-tabler::navlist.group class="mb-0"><li class="nav-item">x</li></x-tabler::navlist.group>')
            ->assertSee('mb-0', false)
            ->assertDontSee('text-uppercase', false);
    }

    public function test_group_sin_heading_tiene_raiz_presentation(): void
    {
        // La raiz transparente lleva role="presentation" para no interferir con la
        // semantica de la lista de navegacion.
        $this->blade('<x-tabler::navlist.group><li class="nav-item">x</li></x-tabler::navlist.group>')
            ->assertSee('role="presentation"', false);
    }

    public function test_renderiza_items_del_slot(): void
    {
        $this->blade('<x-tabler::navlist.group heading="Sección"><li class="nav-item">Uno</li></x-tabler::navlist.group>')
            ->assertSee('Sección')
            ->assertSee('Uno');
    }

    public function test_group_fusiona_clases_del_consumidor(): void
    {
        // Subcadena CONTIGUA: la última clase base ('fw-bold') seguida de la del consumidor.
        $this->blade('<x-tabler::navlist.group heading="S" class="mb-0">x</x-tabler::navlist.group>')
            ->assertSee('fw-bold mb-0', false);
    }

    // --- badge ---

    public function test_badge_color_por_defecto_secondary(): void
    {
        $this->blade('<x-tabler::navlist.badge>3</x-tabler::navlist.badge>')
            ->assertSee('badge', false)
            ->assertSee('badge-sm', false)
            ->assertSee('bg-secondary-lt', false)
            ->assertSee('ms-auto', false)
            ->assertSee('3');
    }

    public function test_badge_color_red(): void
    {
        $this->blade('<x-tabler::navlist.badge color="red">!</x-tabler::navlist.badge>')
            ->assertSee('bg-red-lt', false);
    }

    public function test_badge_color_green(): void
    {
        $this->blade('<x-tabler::navlist.badge color="green">OK</x-tabler::navlist.badge>')
            ->assertSee('bg-green-lt', false);
    }

    public function test_badge_fusiona_clases_del_consumidor(): void
    {
        // Subcadena CONTIGUA: la última clase base ('ms-auto') seguida de la del consumidor.
        $this->blade('<x-tabler::navlist.badge class="text-uppercase">x</x-tabler::navlist.badge>')
            ->assertSee('ms-auto text-uppercase', false);
    }
}
