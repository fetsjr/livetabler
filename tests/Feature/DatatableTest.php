<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class DatatableTest extends TestCase
{
    public function test_renderiza_tabla_con_clases_base(): void
    {
        $this->blade('<x-tabler::datatable />')
            ->assertSee('table card-table table-vcenter', false)
            ->assertSee('datatable', false)
            ->assertSee('table-responsive', false);
    }

    public function test_columnas_renderizan_como_th(): void
    {
        $this->blade('<x-tabler::datatable :columns="[\'name\' => \'Nombre\', \'email\' => \'Correo\']" />')
            ->assertSee('<th', false)
            ->assertSee('Nombre')
            ->assertSee('Correo');
    }

    public function test_slot_se_renderiza_en_tbody_sin_url(): void
    {
        $this->blade('<x-tabler::datatable><tr><td>Fila</td></tr></x-tabler::datatable>')
            ->assertSee('<tbody>', false)
            ->assertSee('Fila');
    }

    public function test_con_url_no_renderiza_tbody_ni_slot(): void
    {
        $this->blade('<x-tabler::datatable url="/api/users"><tr><td>Fila</td></tr></x-tabler::datatable>')
            ->assertDontSee('<tbody>', false)
            ->assertDontSee('Fila');
    }

    public function test_script_inicializa_datatable_en_espanol(): void
    {
        $this->blade('<x-tabler::datatable />')
            ->assertSee('DataTable', false)
            ->assertSee('Buscar:', false);
    }

    public function test_fusiona_clases_del_consumidor_en_la_tabla(): void
    {
        $this->blade('<x-tabler::datatable class="mb-0" />')
            ->assertSee('text-nowrap datatable mb-0', false);
    }
}
