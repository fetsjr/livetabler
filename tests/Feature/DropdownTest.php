<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class DropdownTest extends TestCase
{
    public function test_clase_base(): void
    {
        $this->blade('<x-tabler::dropdown>Items</x-tabler::dropdown>')
            ->assertSee('dropdown', false)
            ->assertSee('dropdown-menu', false);
    }

    public function test_sin_variant_no_lanza_excepcion_y_usa_secondary(): void
    {
        // Antes lanzaba "Undefined variable $variant" al no tener default.
        $this->blade('<x-tabler::dropdown>Items</x-tabler::dropdown>')
            ->assertSee('btn-secondary', false);
    }

    public function test_variant_primary(): void
    {
        $this->blade('<x-tabler::dropdown variant="primary">Items</x-tabler::dropdown>')
            ->assertSee('btn-primary', false);
    }

    public function test_label_personalizado(): void
    {
        $this->blade('<x-tabler::dropdown label="Opciones">Items</x-tabler::dropdown>')
            ->assertSee('Opciones', false);
    }

    public function test_sin_arrow_no_anade_dropdown_toggle(): void
    {
        $this->blade('<x-tabler::dropdown :arrow="false">Items</x-tabler::dropdown>')
            ->assertDontSee('dropdown-toggle', false);
    }

    public function test_muestra_items_del_slot(): void
    {
        $this->blade('<x-tabler::dropdown><a class="dropdown-item" href="#">Editar</a></x-tabler::dropdown>')
            ->assertSee('Editar', false);
    }

    public function test_align_start(): void
    {
        $this->blade('<x-tabler::dropdown align="start">Items</x-tabler::dropdown>')
            ->assertSee('dropdown-menu-start', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::dropdown class="d-inline">Items</x-tabler::dropdown>')
            ->assertSee('dropdown d-inline', false);
    }
}
