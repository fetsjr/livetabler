<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class ModalTest extends TestCase
{
    public function test_clases_base(): void
    {
        $this->blade('<x-tabler::modal>Contenido</x-tabler::modal>')
            ->assertSee('modal modal-blur fade', false);
    }

    public function test_id_personalizado(): void
    {
        $this->blade('<x-tabler::modal id="confirmar">Contenido</x-tabler::modal>')
            ->assertSee('id="confirmar"', false);
    }

    public function test_tamano(): void
    {
        $this->blade('<x-tabler::modal size="lg">Contenido</x-tabler::modal>')
            ->assertSee('modal-lg', false);
    }

    public function test_titulo(): void
    {
        $this->blade('<x-tabler::modal title="Eliminar">Contenido</x-tabler::modal>')
            ->assertSee('modal-title', false)
            ->assertSee('Eliminar');
    }

    public function test_muestra_el_cuerpo(): void
    {
        $this->blade('<x-tabler::modal>Hola cuerpo</x-tabler::modal>')
            ->assertSee('modal-body', false)
            ->assertSee('Hola cuerpo');
    }

    public function test_slot_footer(): void
    {
        $this->blade('<x-tabler::modal><x-slot:footer>Pie del modal</x-slot:footer>Cuerpo</x-tabler::modal>')
            ->assertSee('modal-footer', false)
            ->assertSee('Pie del modal');
    }

    public function test_status_anade_barra_de_color(): void
    {
        $this->blade('<x-tabler::modal status="danger">Contenido</x-tabler::modal>')
            ->assertSee('modal-status bg-danger', false);
    }

    public function test_scrollable(): void
    {
        $this->blade('<x-tabler::modal :scrollable="true">Contenido</x-tabler::modal>')
            ->assertSee('modal-dialog-scrollable', false);
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::modal class="custom">Contenido</x-tabler::modal>')
            ->assertSee('fade custom', false);
    }
}
