<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class CalloutTest extends TestCase
{
    public function test_variante_info_por_defecto(): void
    {
        $this->blade('<x-tabler::callout>Nota</x-tabler::callout>')
            ->assertSee('alert alert-info', false)
            ->assertSee('Nota', false);
    }

    public function test_variante_danger(): void
    {
        $this->blade('<x-tabler::callout variant="danger">Nota</x-tabler::callout>')
            ->assertSee('alert-danger', false);
    }

    public function test_variante_desconocida_cae_en_info(): void
    {
        $this->blade('<x-tabler::callout variant="cosa">Nota</x-tabler::callout>')
            ->assertSee('alert-info', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::callout class="mb-0">Nota</x-tabler::callout>')
            ->assertSee('alert-info mb-0', false);
    }
}
