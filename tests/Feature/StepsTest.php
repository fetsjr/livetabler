<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class StepsTest extends TestCase
{
    public function test_index_renderiza_steps(): void
    {
        $this->blade('<x-tabler::steps>contenido</x-tabler::steps>')
            ->assertSee('steps', false);
    }

    public function test_index_counter_anade_clase(): void
    {
        $this->blade('<x-tabler::steps :counter="true" />')
            ->assertSee('steps-counter', false);
    }

    public function test_index_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::steps class="my-3" />')
            ->assertSee('steps my-3', false);
    }

    public function test_item_renderiza_step_item(): void
    {
        $this->blade('<x-tabler::steps.item title="Paso 1" />')
            ->assertSee('step-item', false);
    }

    public function test_item_activo_anade_active(): void
    {
        $this->blade('<x-tabler::steps.item :active="true" title="Paso 1" />')
            ->assertSee('active', false);
    }

    public function test_item_muestra_titulo(): void
    {
        $this->blade('<x-tabler::steps.item title="Paso 1" />')
            ->assertSee('Paso 1');
    }

    public function test_item_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::steps.item title="Paso 1" class="text-red" />')
            ->assertSee('step-item text-red', false);
    }
}
