<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class LinkTest extends TestCase
{
    public function test_renderiza_un_enlace_con_su_contenido(): void
    {
        $html = $this->blade('<x-tabler::link>Ir</x-tabler::link>')->__toString();

        $this->assertStringContainsString('<a', $html);
        $this->assertStringContainsString('Ir', $html);
    }

    public function test_variante_anade_clase_de_tabler(): void
    {
        $this->blade('<x-tabler::link variant="secondary">Ir</x-tabler::link>')
            ->assertSee('link-secondary', false);
    }

    public function test_sin_variante_no_anade_clase_link(): void
    {
        $this->blade('<x-tabler::link>Ir</x-tabler::link>')
            ->assertDontSee('link-', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::link variant="secondary" class="fw-bold">Ir</x-tabler::link>')
            ->assertSee('link-secondary fw-bold', false);
    }
}
