<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class MenuCheckboxTest extends TestCase
{
    // ----------------------------------------------------------------------
    // menu.checkbox
    // ----------------------------------------------------------------------

    public function test_checkbox_es_label_dropdown_item_con_input(): void
    {
        $html = $this->blade('<x-tabler::menu.checkbox>Activo</x-tabler::menu.checkbox>')->__toString();

        $this->assertStringContainsString('<label', $html);
        $this->assertStringContainsString('dropdown-item', $html);
        $this->assertStringContainsString('form-check-input m-0 me-2', $html);
        $this->assertStringContainsString('type="checkbox"', $html);
    }

    public function test_checkbox_emite_name_y_value(): void
    {
        $this->blade('<x-tabler::menu.checkbox name="f[]" value="a">A</x-tabler::menu.checkbox>')
            ->assertSee('name="f[]"', false)
            ->assertSee('value="a"', false);
    }

    public function test_checkbox_marcado(): void
    {
        $this->blade('<x-tabler::menu.checkbox :checked="true">A</x-tabler::menu.checkbox>')
            ->assertSee('checked', false);
    }

    public function test_checkbox_deshabilitado(): void
    {
        $this->blade('<x-tabler::menu.checkbox :disabled="true">A</x-tabler::menu.checkbox>')
            ->assertSee('disabled', false);
    }

    public function test_checkbox_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::menu.checkbox class="fw-bold">A</x-tabler::menu.checkbox>')
            ->assertSee('dropdown-item fw-bold', false);
    }

    // ----------------------------------------------------------------------
    // menu.checkbox.group
    // ----------------------------------------------------------------------

    public function test_checkbox_group_con_heading(): void
    {
        $this->blade('<x-tabler::menu.checkbox.group heading="Filtros"><span>x</span></x-tabler::menu.checkbox.group>')
            ->assertSee('dropdown-header', false)
            ->assertSee('Filtros');
    }

    public function test_checkbox_group_sin_heading_es_transparente(): void
    {
        $html = $this->blade('<x-tabler::menu.checkbox.group><span>contenido</span></x-tabler::menu.checkbox.group>')->__toString();
        $this->assertStringNotContainsString('dropdown-header', $html);
        $this->assertStringContainsString('contenido', $html);
    }

    public function test_checkbox_group_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::menu.checkbox.group heading="X" class="text-muted">y</x-tabler::menu.checkbox.group>')
            ->assertSee('dropdown-header text-muted', false);
    }
}
