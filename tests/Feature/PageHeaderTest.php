<?php
namespace Tabler\Tests\Feature;
use Tabler\Tests\TestCase;
class PageHeaderTest extends TestCase
{
    public function test_renderiza_page_header(): void
    { $this->blade('<x-tabler::page-header title="Panel" />')->assertSee('page-header', false)->assertSee('page-title', false)->assertSee('Panel'); }

    public function test_pretitle(): void
    { $this->blade('<x-tabler::page-header pretitle="Inicio" title="Panel" />')->assertSee('page-pretitle', false)->assertSee('Inicio'); }

    public function test_acciones_en_slot(): void
    { $this->blade('<x-tabler::page-header title="x"><button>Nuevo</button></x-tabler::page-header>')->assertSee('btn-list', false)->assertSee('Nuevo'); }

    public function test_fluid(): void
    { $this->blade('<x-tabler::page-header title="x" :fluid="true" />')->assertSee('container-fluid', false); }
}
