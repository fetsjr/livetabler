<?php
namespace Tabler\Tests\Feature;
use Tabler\Tests\TestCase;
class NavbarTest extends TestCase
{
    public function test_estructura_basica(): void
    { $this->blade('<x-tabler::navbar>x</x-tabler::navbar>')->assertSee('navbar navbar-expand-md', false)->assertSee('Tabler'); }

    public function test_tema_oscuro(): void
    { $this->blade('<x-tabler::navbar theme="dark">x</x-tabler::navbar>')->assertSee('navbar-dark', false)->assertSee('data-bs-theme="dark"', false); }

    public function test_sticky(): void
    { $this->blade('<x-tabler::navbar :sticky="true">x</x-tabler::navbar>')->assertSee('sticky-top', false); }

    public function test_brand_personalizado(): void
    { $this->blade('<x-tabler::navbar brand="MiApp">x</x-tabler::navbar>')->assertSee('MiApp'); }

    public function test_logo(): void
    { $this->blade('<x-tabler::navbar logo="/logo.png">x</x-tabler::navbar>')->assertSee('<img', false)->assertSee('/logo.png', false); }

    public function test_items_del_slot(): void
    { $this->blade('<x-tabler::navbar><li class="nav-item">Inicio</li></x-tabler::navbar>')->assertSee('Inicio'); }

    public function test_fusiona_clases(): void
    {
        // La clase del consumidor ('shadow') se fusiona en el ÚNICO atributo class del
        // elemento raíz, quedando junto a las clases base del navbar.
        $this->blade('<x-tabler::navbar class="shadow">x</x-tabler::navbar>')
            ->assertSee('navbar', false)
            ->assertSee('shadow', false)
            ->assertSee('navbar-light shadow', false);
    }
}
