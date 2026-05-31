<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class PlaygroundTest extends TestCase
{
    /**
     * La ruta raíz del playground responde correctamente y muestra botones.
     */
    public function test_la_ruta_del_playground_responde(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Playground')
            ->assertSee('btn-primary', false);
    }
}
