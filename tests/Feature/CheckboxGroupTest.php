<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class CheckboxGroupTest extends TestCase
{
    public function test_apila_las_casillas_por_defecto(): void
    {
        $this->blade('<x-tabler::checkbox.group>contenido</x-tabler::checkbox.group>')
            ->assertSee('d-flex flex-column', false)
            ->assertSee('contenido');
    }

    public function test_inline_dispone_las_casillas_en_fila(): void
    {
        $this->blade('<x-tabler::checkbox.group :inline="true">contenido</x-tabler::checkbox.group>')
            ->assertSee('flex-row', false);
    }

    public function test_no_usa_clases_de_tailwind(): void
    {
        $html = $this->blade('<x-tabler::checkbox.group>contenido</x-tabler::checkbox.group>')->__toString();

        // El token de Tailwind 'flex-col' no debe aparecer como clase suelta
        // (Bootstrap usa 'flex-column'). Comprobamos con límites de palabra para
        // no confundirlo con 'flex-column'.
        $this->assertDoesNotMatchRegularExpression('/\bflex-col\b/', $html);
        // Tampoco la clase 'flex' suelta de Tailwind (Bootstrap usa 'd-flex').
        $this->assertDoesNotMatchRegularExpression('/class="flex[ "]/', $html);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::checkbox.group class="mt-2">contenido</x-tabler::checkbox.group>')
            ->assertSee('gap-2 mt-2', false);
    }
}
