<?php
namespace Tabler\Tests\Feature;
use Tabler\Tests\TestCase;
class CheckboxTest extends TestCase
{
    public function test_estructura_basica(): void
    { $this->blade('<x-tabler::checkbox name="acepto" />')->assertSee('form-check', false)->assertSee('form-check-input', false)->assertSee('type="checkbox"', false); }

    public function test_checked(): void
    { $this->blade('<x-tabler::checkbox name="x" :checked="true" />')->assertSee('checked', false); }

    public function test_label(): void
    { $this->blade('<x-tabler::checkbox name="x" label="Acepto los términos" />')->assertSee('form-check-label', false)->assertSee('Acepto los términos'); }

    public function test_switch(): void
    { $this->blade('<x-tabler::checkbox name="x" :switch="true" />')->assertSee('form-switch', false); }
}
