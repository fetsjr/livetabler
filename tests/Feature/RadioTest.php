<?php
namespace Tabler\Tests\Feature;
use Tabler\Tests\TestCase;
class RadioTest extends TestCase
{
    public function test_estructura_basica(): void
    { $this->blade('<x-tabler::radio name="plan" value="pro" />')->assertSee('form-check', false)->assertSee('type="radio"', false); }

    public function test_value(): void
    { $this->blade('<x-tabler::radio name="plan" value="pro" />')->assertSee('value="pro"', false); }

    public function test_label(): void
    { $this->blade('<x-tabler::radio name="plan" value="pro" label="Plan Pro" />')->assertSee('Plan Pro'); }
}
