<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class CalendarTest extends TestCase
{
    public function test_renderiza_card_con_text_uppercase(): void
    {
        $this->blade('<x-tabler::calendar />')
            ->assertSee('card', false)
            ->assertSee('text-uppercase', false)
            ->assertDontSee('"bg-danger text-white text-center py-1 small fw-bold uppercase"', false);
    }

    public function test_mes_personalizado(): void
    {
        $this->blade('<x-tabler::calendar month="ENE" />')
            ->assertSee('ENE');
    }

    public function test_dia_personalizado(): void
    {
        $this->blade('<x-tabler::calendar day="15" />')
            ->assertSee('15');
    }

    public function test_fusiona_clases_del_consumidor(): void
    {
        $this->blade('<x-tabler::calendar class="me-2" />')
            ->assertSee('overflow-hidden me-2', false);
    }
}
