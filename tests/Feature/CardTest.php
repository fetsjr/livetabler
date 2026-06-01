<?php
namespace Tabler\Tests\Feature;
use Tabler\Tests\TestCase;
class CardTest extends TestCase
{
    public function test_renderiza_card(): void
    { $this->blade('<x-tabler::card>contenido</x-tabler::card>')->assertSee('card', false)->assertSee('contenido'); }

    public function test_tamano_sm(): void
    { $this->blade('<x-tabler::card :sm="true">x</x-tabler::card>')->assertSee('card-sm', false); }

    public function test_titulo(): void
    { $this->blade('<x-tabler::card title="Resumen">x</x-tabler::card>')->assertSee('card-title', false)->assertSee('Resumen'); }

    public function test_barra_de_estado(): void
    { $this->blade('<x-tabler::card status="success">x</x-tabler::card>')->assertSee('card-status-top bg-success', false); }

    public function test_footer_slot(): void
    { $this->blade('<x-tabler::card><x-slot:footer>pie</x-slot:footer>cuerpo</x-tabler::card>')->assertSee('card-footer', false)->assertSee('pie'); }

    public function test_fusiona_clases(): void
    { $this->blade('<x-tabler::card class="shadow">x</x-tabler::card>')->assertSee('card shadow', false); }
}
