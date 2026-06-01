<?php
namespace Tabler\Tests\Feature;
use Tabler\Tests\TestCase;
class TextareaTest extends TestCase
{
    public function test_renderiza_form_control(): void
    { $this->blade('<x-tabler::textarea name="bio" />')->assertSee('form-control', false)->assertSee('rows="4"', false); }

    public function test_slot_dentro(): void
    { $this->blade('<x-tabler::textarea name="bio">Hola</x-tabler::textarea>')->assertSee('Hola'); }

    public function test_invalid_explicito(): void
    { $this->blade('<x-tabler::textarea name="bio" :invalid="true" />')->assertSee('is-invalid', false); }

    public function test_invalid_por_error_de_validacion(): void
    { $this->withViewErrors(['bio' => 'Requerido'])->blade('<x-tabler::textarea name="bio" />')->assertSee('is-invalid', false); }

    public function test_fusiona_clases_del_consumidor(): void
    { $this->blade('<x-tabler::textarea name="bio" class="w-100" />')->assertSee('form-control w-100', false); }
}
