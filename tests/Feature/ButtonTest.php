<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class ButtonTest extends TestCase
{
    public function test_variante_primary_por_defecto(): void
    {
        $this->blade('<x-tabler::button>OK</x-tabler::button>')
            ->assertSee('btn btn-primary', false);
    }

    public function test_variante_secondary(): void
    {
        $this->blade('<x-tabler::button variant="secondary">OK</x-tabler::button>')
            ->assertSee('btn-secondary', false);
    }

    public function test_variante_outline_usa_color(): void
    {
        $this->blade('<x-tabler::button variant="outline" color="danger">OK</x-tabler::button>')
            ->assertSee('btn-outline-danger', false);
    }

    public function test_variante_ghost_usa_color(): void
    {
        $this->blade('<x-tabler::button variant="ghost" color="success">OK</x-tabler::button>')
            ->assertSee('btn-ghost-success', false);
    }

    public function test_variante_link(): void
    {
        $this->blade('<x-tabler::button variant="link">OK</x-tabler::button>')
            ->assertSee('btn-link', false);
    }

    public function test_color_directo_como_variante(): void
    {
        $this->blade('<x-tabler::button variant="warning">OK</x-tabler::button>')
            ->assertSee('btn-warning', false);
    }

    public function test_tamano_lg(): void
    {
        $this->blade('<x-tabler::button size="lg">OK</x-tabler::button>')
            ->assertSee('btn-lg', false);
    }

    public function test_tamano_md_no_anade_clase(): void
    {
        $this->blade('<x-tabler::button size="md">OK</x-tabler::button>')
            ->assertDontSee('btn-md', false);
    }

    public function test_estado_loading(): void
    {
        $this->blade('<x-tabler::button :loading="true">OK</x-tabler::button>')
            ->assertSee('btn-loading', false)
            ->assertSee('disabled', false);
    }

    public function test_pill_y_square(): void
    {
        $this->blade('<x-tabler::button :pill="true" :square="true">OK</x-tabler::button>')
            ->assertSee('btn-pill', false)
            ->assertSee('btn-square', false);
    }

    public function test_se_renderiza_como_enlace_con_href(): void
    {
        $html = $this->blade('<x-tabler::button href="/panel">Ir</x-tabler::button>')->__toString();

        $this->assertStringContainsString('<a', $html);
        $this->assertStringContainsString('href="/panel"', $html);
    }

    public function test_como_boton_lleva_type(): void
    {
        $this->blade('<x-tabler::button type="submit">Enviar</x-tabler::button>')
            ->assertSee('type="submit"', false);
    }

    public function test_icono_no_lanza_excepcion(): void
    {
        $this->blade('<x-tabler::button icon="home">Inicio</x-tabler::button>')
            ->assertSee('ti-home', false)
            ->assertSee('Inicio');
    }
}
