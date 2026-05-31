<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class LabelTest extends TestCase
{
    public function test_renderiza_form_label(): void
    {
        $this->blade('<x-tabler::label>Nombre</x-tabler::label>')
            ->assertSee('form-label', false)
            ->assertSee('Nombre');
    }

    public function test_sr_only(): void
    {
        $this->blade('<x-tabler::label :srOnly="true">x</x-tabler::label>')
            ->assertSee('sr-only', false);
    }

    public function test_muestra_badge(): void
    {
        $this->blade('<x-tabler::label badge="3">x</x-tabler::label>')
            ->assertSee('badge', false)
            ->assertSee('3');
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::label class="fw-bold">x</x-tabler::label>')
            ->assertSee('form-label fw-bold', false);
    }
}
