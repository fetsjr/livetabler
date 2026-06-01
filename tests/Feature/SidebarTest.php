<?php
namespace Tabler\Tests\Feature;
use Tabler\Tests\TestCase;
class SidebarTest extends TestCase
{
    public function test_es_un_aside_vertical(): void
    {
        $html = $this->blade('<x-tabler::sidebar>x</x-tabler::sidebar>')->__toString();
        $this->assertStringContainsString('navbar navbar-vertical', $html);
        $this->assertStringContainsString('<aside', $html);
    }

    public function test_no_abre_wrapper_page(): void
    {
        // El sidebar NO debe crear el contenedor .page (eso es trabajo del layout).
        $html = $this->blade('<x-tabler::sidebar>x</x-tabler::sidebar>')->__toString();
        $this->assertStringNotContainsString('class="page"', $html);
    }

    public function test_tema_oscuro_por_defecto(): void
    { $this->blade('<x-tabler::sidebar>x</x-tabler::sidebar>')->assertSee('navbar-dark', false)->assertSee('data-bs-theme="dark"', false); }

    public function test_brand(): void
    { $this->blade('<x-tabler::sidebar brand="MiApp">x</x-tabler::sidebar>')->assertSee('MiApp'); }

    public function test_items_del_slot(): void
    { $this->blade('<x-tabler::sidebar><li class="nav-item">Inicio</li></x-tabler::sidebar>')->assertSee('Inicio'); }

    public function test_fusiona_clases(): void
    {
        // La clase del consumidor ('shadow') se fusiona en el ÚNICO atributo class del
        // elemento raíz <aside>, quedando junto a las clases base del sidebar.
        $this->blade('<x-tabler::sidebar class="shadow">x</x-tabler::sidebar>')
            ->assertSee('navbar-vertical', false)
            ->assertSee('shadow', false)
            ->assertSee('navbar-dark shadow', false);
    }
}
