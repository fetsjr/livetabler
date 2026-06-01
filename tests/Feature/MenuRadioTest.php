<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class MenuRadioTest extends TestCase
{
    // ----------------------------------------------------------------------
    // menu.radio
    // ----------------------------------------------------------------------

    public function test_radio_es_label_dropdown_item_con_input_radio(): void
    {
        $html = $this->blade('<x-tabler::menu.radio>Asc</x-tabler::menu.radio>')->__toString();

        $this->assertStringContainsString('<label', $html);
        $this->assertStringContainsString('dropdown-item', $html);
        $this->assertStringContainsString('form-check-input m-0 me-2', $html);
        $this->assertStringContainsString('type="radio"', $html);
    }

    public function test_radio_comparte_name(): void
    {
        $this->blade('<x-tabler::menu.radio name="orden" value="asc">Asc</x-tabler::menu.radio>')
            ->assertSee('name="orden"', false)
            ->assertSee('value="asc"', false);
    }

    public function test_radio_seleccionado(): void
    {
        $this->blade('<x-tabler::menu.radio :checked="true">Asc</x-tabler::menu.radio>')
            ->assertSee('checked', false);
    }

    public function test_radio_deshabilitado(): void
    {
        // El atributo disabled debe ir EN el <input> (no solo la clase del label).
        $html = $this->blade('<x-tabler::menu.radio :disabled="true">Asc</x-tabler::menu.radio>')->__toString();

        $this->assertMatchesRegularExpression('/<input\b[^>]*\btype="radio"[^>]*\bdisabled\b/s', $html);
    }

    public function test_radio_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::menu.radio class="fw-bold">Asc</x-tabler::menu.radio>')
            ->assertSee('dropdown-item fw-bold', false);
    }

    // ----------------------------------------------------------------------
    // menu.radio.group
    // ----------------------------------------------------------------------

    public function test_radio_group_con_heading(): void
    {
        $this->blade('<x-tabler::menu.radio.group heading="Ordenar"><span>x</span></x-tabler::menu.radio.group>')
            ->assertSee('dropdown-header', false)
            ->assertSee('Ordenar');
    }

    public function test_radio_group_sin_heading_es_transparente(): void
    {
        $html = $this->blade('<x-tabler::menu.radio.group><span>contenido</span></x-tabler::menu.radio.group>')->__toString();
        $this->assertStringNotContainsString('dropdown-header', $html);
        $this->assertStringContainsString('contenido', $html);
    }

    public function test_radio_group_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::menu.radio.group heading="X" class="text-muted">y</x-tabler::menu.radio.group>')
            ->assertSee('dropdown-header text-muted', false);
    }
}
