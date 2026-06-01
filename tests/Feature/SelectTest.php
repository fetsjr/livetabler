<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class SelectTest extends TestCase
{
    public function test_renderiza_form_select(): void
    {
        $this->blade('<x-tabler::select name="pais" />')
            ->assertSee('form-select', false)
            ->assertSee('name="pais"', false);
    }

    public function test_renderiza_opciones_desde_array(): void
    {
        $this->blade('<x-tabler::select name="pais" :options="[\'mx\' => \'México\', \'es\' => \'España\']" />')
            ->assertSee('value="mx"', false)
            ->assertSee('México')
            ->assertSee('España');
    }

    public function test_marca_la_opcion_seleccionada(): void
    {
        $this->blade('<x-tabler::select name="pais" value="es" :options="[\'mx\' => \'México\', \'es\' => \'España\']" />')
            ->assertSee('value="es" selected', false);
    }

    public function test_muestra_label(): void
    {
        $this->blade('<x-tabler::select name="pais" label="País" />')
            ->assertSee('form-label', false)
            ->assertSee('País');
    }

    public function test_multiple_usa_array_name_y_atributo(): void
    {
        $this->blade('<x-tabler::select name="tags" :multiple="true" />')
            ->assertSee('name="tags[]"', false)
            ->assertSee('multiple', false);
    }

    public function test_placeholder_como_primera_opcion(): void
    {
        $this->blade('<x-tabler::select name="pais" placeholder="Elige..." />')
            ->assertSee('<option value="">Elige...</option>', false);
    }

    public function test_estado_invalido_con_error(): void
    {
        $this->withViewErrors(['pais' => 'Selecciona un país'])
            ->blade('<x-tabler::select name="pais" />')
            ->assertSee('is-invalid', false)
            ->assertSee('Selecciona un país');
    }

    public function test_sin_error_no_lanza_excepcion(): void
    {
        // Sin compartir $errors, no debe lanzar "Undefined variable $errors".
        $this->blade('<x-tabler::select name="pais" />')
            ->assertSee('form-select', false);
    }
}
