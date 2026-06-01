<?php
namespace Tabler\Tests\Feature;
use Tabler\Tests\TestCase;
class PageBodyTest extends TestCase
{
    public function test_renderiza_page_body_una_sola_vez(): void
    {
        $html = $this->blade('<x-tabler::page-body>contenido</x-tabler::page-body>')->__toString();
        $this->assertStringContainsString('page-body', $html);
        $this->assertStringContainsString('container-xl', $html);
        $this->assertStringContainsString('contenido', $html);
        // La clase page-body no debe aparecer duplicada (bug anterior).
        $this->assertSame(1, substr_count($html, 'page-body'));
    }

    public function test_fluid(): void
    { $this->blade('<x-tabler::page-body :fluid="true">x</x-tabler::page-body>')->assertSee('container-fluid', false); }

    public function test_fusiona_clases(): void
    { $this->blade('<x-tabler::page-body class="pt-0">x</x-tabler::page-body>')->assertSee('page-body pt-0', false); }
}
