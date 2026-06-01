<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class DescriptionTest extends TestCase
{
    public function test_renderiza_form_hint_con_contenido(): void
    {
        $this->blade('<x-tabler::description>Ayuda</x-tabler::description>')
            ->assertSee('form-hint', false)
            ->assertSee('Ayuda', false);
    }

    public function test_sr_only_oculta_visualmente(): void
    {
        $this->blade('<x-tabler::description :srOnly="true">Ayuda</x-tabler::description>')
            ->assertSee('sr-only', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::description class="mt-1">Ayuda</x-tabler::description>')
            ->assertSee('form-hint mt-1', false);
    }
}
