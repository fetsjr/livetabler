<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class OtpTest extends TestCase
{
    public function test_renderiza_seis_cajas_por_defecto(): void
    {
        // Por defecto length=6 -> 6 inputs .form-control.
        $html = (string) $this->blade('<x-tabler::otp wire:model="codigo" />');

        $this->assertSame(6, substr_count($html, 'form-control'));
        $this->assertSame(6, substr_count($html, 'type="text"'));
    }

    public function test_respeta_la_prop_length(): void
    {
        // length=4 -> 4 cajas.
        $html = (string) $this->blade('<x-tabler::otp length="4" wire:model="codigo" />');

        $this->assertSame(4, substr_count($html, 'form-control'));
    }

    public function test_raiz_tiene_x_data_y_wiring_alpine(): void
    {
        // La raiz arranca el bloque Alpine que mantiene el comportamiento OTP.
        $this->blade('<x-tabler::otp wire:model="codigo" />')
            ->assertSee('x-data', false)
            ->assertSee('handleInput', false)
            ->assertSee('handlePaste', false);
    }

    public function test_cada_caja_lleva_x_ref_e_input(): void
    {
        // Cada caja se referencia por x-ref y reacciona a @input.
        $this->blade('<x-tabler::otp wire:model="codigo" />')
            ->assertSee('x-ref="input0"', false)
            ->assertSee('@input="handleInput', false)
            ->assertSee('@paste="handlePaste"', false);
    }

    public function test_fusiona_clases_del_consumidor_en_la_raiz(): void
    {
        // La ultima clase base de la raiz es 'gap-2' y la del consumidor se anade al
        // final: subcadena contigua "gap-2 mi-clase".
        $this->blade('<x-tabler::otp class="mi-clase" wire:model="codigo" />')
            ->assertSee('gap-2 mi-clase', false);
    }
}
