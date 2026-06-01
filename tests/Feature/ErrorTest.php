<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class ErrorTest extends TestCase
{
    public function test_render_aislado_sin_errores_no_lanza_y_se_oculta(): void
    {
        $this->blade('<x-tabler::error name="x" />')
            ->assertSee('d-none', false)
            ->assertDontSee('d-block', false);
    }

    public function test_mensaje_explicito_se_muestra(): void
    {
        $this->blade('<x-tabler::error message="Requerido" />')
            ->assertSee('d-block', false)
            ->assertSee('Requerido', false);
    }

    public function test_muestra_error_de_validacion_compartido(): void
    {
        $this->withViewErrors(['email' => 'El correo es obligatorio'])
            ->blade('<x-tabler::error name="email" />')
            ->assertSee('d-block', false)
            ->assertSee('El correo es obligatorio', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::error message="Requerido" class="ms-1" />')
            ->assertSee('ms-1', false);
    }
}
