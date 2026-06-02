<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class SliderTest extends TestCase
{
    public function test_renderiza_input_range_con_form_range(): void
    {
        // El control es un <input type="range"> con la clase de Bootstrap form-range.
        $this->blade('<x-tabler::slider />')
            ->assertSee('type="range"', false)
            ->assertSee('form-range', false);
    }

    public function test_emite_min_max_y_step(): void
    {
        // Las props min/max/step se reflejan como atributos del input.
        $this->blade('<x-tabler::slider min="10" max="200" step="5" />')
            ->assertSee('min="10"', false)
            ->assertSee('max="200"', false)
            ->assertSee('step="5"', false);
    }

    public function test_x_model_value_presente(): void
    {
        // El input se enlaza al estado Alpine via x-model="value".
        $this->blade('<x-tabler::slider />')
            ->assertSee('x-model="value"', false)
            ->assertSee('x-data', false);
    }

    public function test_valor_inicial_desde_la_prop_value_sin_wire_model(): void
    {
        // Sin wire:model, el estado Alpine arranca desde la prop value, escapada de forma
        // segura: Js::from cita el string y el atributo HTML escapa las comillas a &#039;
        // (Alpine las decodifica en runtime). SIN entangle de Livewire.
        $this->blade('<x-tabler::slider value="33" />')
            ->assertSee('value: &#039;33&#039;', false)
            ->assertDontSee('$wire.entangle', false);
    }

    public function test_valor_inicial_por_defecto_es_50(): void
    {
        // Sin value ni wire:model, arranca desde el default 50 de la prop.
        $this->blade('<x-tabler::slider />')
            ->assertSee('value: 50', false);
    }

    public function test_fusiona_clases_del_consumidor_en_el_input(): void
    {
        // La clase del consumidor se fusiona en el input justo despues de form-range:
        // subcadena contigua "form-range mi-clase".
        $this->blade('<x-tabler::slider class="mi-clase" />')
            ->assertSee('form-range mi-clase', false);
    }
}
