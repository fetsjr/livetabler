<?php
namespace Tabler\Tests\Feature;
use Tabler\Tests\TestCase;
class SwitchTest extends TestCase
{
    public function test_es_un_switch(): void
    { $this->blade('<x-tabler::switch name="activo" />')->assertSee('form-check form-switch', false)->assertSee('form-check-input', false); }

    public function test_checked(): void
    { $this->blade('<x-tabler::switch name="x" :checked="true" />')->assertSee('checked', false); }

    public function test_label(): void
    { $this->blade('<x-tabler::switch name="x" label="Notificaciones" />')->assertSee('Notificaciones'); }
}
