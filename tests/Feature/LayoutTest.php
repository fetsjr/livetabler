<?php
namespace Tabler\Tests\Feature;
use Tabler\Tests\TestCase;
class LayoutTest extends TestCase
{
    public function test_estructura_page_y_wrapper(): void
    { $this->blade('<x-tabler::layout>contenido</x-tabler::layout>')->assertSee('class="page"', false)->assertSee('page-wrapper', false)->assertSee('contenido'); }

    public function test_renderiza_slot_sidebar(): void
    { $this->blade('<x-tabler::layout><x-slot:sidebar>MI_SIDEBAR</x-slot:sidebar>x</x-tabler::layout>')->assertSee('MI_SIDEBAR'); }

    public function test_renderiza_slot_navbar(): void
    { $this->blade('<x-tabler::layout><x-slot:navbar>MI_NAVBAR</x-slot:navbar>x</x-tabler::layout>')->assertSee('MI_NAVBAR'); }

    public function test_footer_por_defecto_copyright(): void
    { $this->blade('<x-tabler::layout brand="MiApp">x</x-tabler::layout>')->assertSee('footer', false)->assertSee('MiApp'); }

    public function test_footer_personalizado(): void
    { $this->blade('<x-tabler::layout><x-slot:footer>MI_PIE</x-slot:footer>x</x-tabler::layout>')->assertSee('MI_PIE'); }

    public function test_no_duplica_aside(): void
    {
        // El layout NO debe crear su propio <aside>; eso lo aporta el slot sidebar.
        $html = $this->blade('<x-tabler::layout><x-slot:sidebar><aside>S</aside></x-slot:sidebar>x</x-tabler::layout>')->__toString();
        $this->assertSame(1, substr_count($html, '<aside'));
    }

    public function test_fusiona_clases(): void
    { $this->blade('<x-tabler::layout class="theme-dark">x</x-tabler::layout>')->assertSee('page theme-dark', false); }
}
