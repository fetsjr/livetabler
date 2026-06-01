<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class FieldsetTest extends TestCase
{
    public function test_renderiza_fieldset_con_clase_y_contenido(): void
    {
        $html = $this->blade('<x-tabler::fieldset>Campos</x-tabler::fieldset>')->__toString();

        $this->assertStringContainsString('<fieldset', $html);
        $this->assertStringContainsString('mb-3', $html);
        $this->assertStringContainsString('Campos', $html);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::fieldset class="border">Campos</x-tabler::fieldset>')
            ->assertSee('mb-3 border', false);
    }

    public function test_no_contiene_clases_de_tailwind(): void
    {
        $this->blade('<x-tabler::fieldset>Campos</x-tabler::fieldset>')
            ->assertDontSee('min-w-0', false)
            ->assertDontSee('mb-6', false);
    }
}
