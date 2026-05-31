<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class InputTest extends TestCase
{
    public function test_renderiza_form_control(): void
    {
        $this->blade('<x-tabler::input name="nombre" />')
            ->assertSee('form-control', false)
            ->assertSee('name="nombre"', false);
    }

    public function test_tipo_por_defecto_text(): void
    {
        $this->blade('<x-tabler::input name="x" />')
            ->assertSee('type="text"', false);
    }

    public function test_muestra_label(): void
    {
        $this->blade('<x-tabler::input name="email" label="Correo" />')
            ->assertSee('form-label', false)
            ->assertSee('Correo');
    }

    public function test_con_icono(): void
    {
        $this->blade('<x-tabler::input name="user" icon="user" />')
            ->assertSee('input-icon', false)
            ->assertSee('ti-user', false);
    }

    public function test_muestra_description(): void
    {
        $this->blade('<x-tabler::input name="x" description="Ayuda" />')
            ->assertSee('form-hint', false)
            ->assertSee('Ayuda');
    }

    public function test_estado_invalido_con_error(): void
    {
        $this->withViewErrors(['email' => 'El correo es obligatorio'])
            ->blade('<x-tabler::input name="email" />')
            ->assertSee('is-invalid', false)
            ->assertSee('El correo es obligatorio');
    }

    public function test_pasa_atributos_extra_al_input(): void
    {
        $this->blade('<x-tabler::input name="x" required placeholder="Escribe" />')
            ->assertSee('required', false)
            ->assertSee('placeholder="Escribe"', false);
    }
}
