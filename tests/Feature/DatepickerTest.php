<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class DatepickerTest extends TestCase
{
    public function test_renderiza_form_control(): void
    {
        $this->blade('<x-tabler::datepicker name="fecha" />')
            ->assertSee('form-control', false)
            ->assertSee('name="fecha"', false);
    }

    public function test_muestra_label_cuando_se_indica(): void
    {
        $this->blade('<x-tabler::datepicker name="fecha" label="Fecha de nacimiento" />')
            ->assertSee('form-label', false)
            ->assertSee('Fecha de nacimiento');
    }

    public function test_con_icono_muestra_input_icon_y_calendario(): void
    {
        $this->blade('<x-tabler::datepicker name="fecha" :icon="true" />')
            ->assertSee('input-icon', false)
            ->assertSee('ti-calendar', false);
    }

    public function test_script_inicializa_litepicker_con_id_y_formato(): void
    {
        $this->blade('<x-tabler::datepicker name="fecha" id="dp-test" format="DD/MM/YYYY" />')
            ->assertSee('window.Litepicker', false)
            ->assertSee('new Litepicker', false)
            ->assertSee("getElementById('dp-test')", false)
            ->assertSee("DD/MM/YYYY", false);
    }

    public function test_estado_invalido_con_error(): void
    {
        $this->withViewErrors(['fecha' => 'La fecha es obligatoria'])
            ->blade('<x-tabler::datepicker name="fecha" />')
            ->assertSee('is-invalid', false)
            ->assertSee('La fecha es obligatoria');
    }

    public function test_render_aislado_sin_errores_no_lanza(): void
    {
        // Sin withViewErrors el bag $errors no está compartido: el componente NO debe lanzar.
        $this->blade('<x-tabler::datepicker name="fecha" />')
            ->assertSee('form-control', false)
            ->assertDontSee('is-invalid', false);
    }
}
