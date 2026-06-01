<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class BreadcrumbTest extends TestCase
{
    public function test_index_renderiza_breadcrumb(): void
    {
        $this->blade('<x-tabler::breadcrumb />')
            ->assertSee('breadcrumb', false);
    }

    public function test_index_sin_items_no_lanza_excepcion(): void
    {
        // El bug real: si $items no tiene default, el @foreach explota.
        $html = $this->blade('<x-tabler::breadcrumb />')->__toString();

        $this->assertStringContainsString('<ol', $html);
    }

    public function test_index_con_items_enlaza_no_ultimos_y_marca_ultimo_activo(): void
    {
        $html = $this->blade(
            '<x-tabler::breadcrumb :items="[\'Inicio\' => \'/\', \'Panel\' => \'/panel\']" />'
        )->__toString();

        // El primero (no último) va enlazado.
        $this->assertStringContainsString('<a href="/">Inicio</a>', $html);
        // El último va activo y sin enlace.
        $this->assertStringContainsString('breadcrumb-item active', $html);
        $this->assertStringContainsString('Panel', $html);
    }

    public function test_index_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::breadcrumb class="breadcrumb-arrows" />')
            ->assertSee('breadcrumb breadcrumb-arrows', false);
    }

    public function test_item_renderiza_breadcrumb_item(): void
    {
        $this->blade('<x-tabler::breadcrumb.item>Inicio</x-tabler::breadcrumb.item>')
            ->assertSee('breadcrumb-item', false);
    }

    public function test_item_activo_marca_active_y_aria_current(): void
    {
        $this->blade('<x-tabler::breadcrumb.item :active="true">Actual</x-tabler::breadcrumb.item>')
            ->assertSee('active', false)
            ->assertSee('aria-current="page"', false);
    }

    public function test_item_con_href_envuelve_en_enlace(): void
    {
        $this->blade('<x-tabler::breadcrumb.item href="/x">Ir</x-tabler::breadcrumb.item>')
            ->assertSee('<a href="/x"', false);
    }
}
