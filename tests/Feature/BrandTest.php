<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class BrandTest extends TestCase
{
    public function test_renderiza_navbar_brand(): void
    {
        $this->blade('<x-tabler::brand />')
            ->assertSee('navbar-brand', false);
    }

    public function test_nombre_personalizado(): void
    {
        $this->blade('<x-tabler::brand name="MiApp" />')
            ->assertSee('MiApp');
    }

    public function test_href_personalizado(): void
    {
        $this->blade('<x-tabler::brand href="/panel" />')
            ->assertSee('href="/panel"', false);
    }

    public function test_sin_logo_renderiza_svg_por_defecto(): void
    {
        $this->blade('<x-tabler::brand />')
            ->assertSee('<svg', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::brand class="px-2" />')
            ->assertSee('navbar-brand-autodark px-2', false);
    }
}
