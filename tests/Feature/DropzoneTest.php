<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class DropzoneTest extends TestCase
{
    public function test_renderiza_clase_dropzone(): void
    {
        $this->blade('<x-tabler::dropzone url="/subir" />')
            ->assertSee('class="dropzone"', false)
            ->assertSee('data-url="/subir"', false);
    }

    public function test_fusiona_clase_del_consumidor_en_un_solo_atributo(): void
    {
        // La clase del consumidor debe quedar contigua a 'dropzone' dentro del MISMO
        // atributo class (sin duplicar el atributo), confirmando que se usa $attributes->class.
        $this->blade('<x-tabler::dropzone class="mt-3" />')
            ->assertSee('class="dropzone mt-3"', false);
    }

    public function test_muestra_el_mensaje_por_defecto(): void
    {
        $this->blade('<x-tabler::dropzone />')
            ->assertSee('Arrastra tus archivos aquí o haz clic para subir');
    }

    public function test_script_inicializa_dropzone_con_guard(): void
    {
        $this->blade('<x-tabler::dropzone />')
            ->assertSee("typeof Dropzone !== 'undefined'", false)
            ->assertSee('new Dropzone', false);
    }

    public function test_maxfiles_y_acceptedfiles_fluyen_al_script(): void
    {
        // acceptedFiles fluye via @js: la barra se escapa a \/ ('application\/pdf').
        $this->blade('<x-tabler::dropzone :max-files="5" accepted-files="application/pdf" />')
            ->assertSee('maxFiles: 5', false)
            ->assertSee("acceptedFiles: 'application\\/pdf'", false);
    }

    public function test_escapa_valores_con_apostrofe_en_el_script_js(): void
    {
        // Un valor con apostrofe (url="/x'y") NO debe romper el literal JS. Con @js el
        // apostrofe se escapa a ' dentro de la cadena, en vez de cerrarla en seco
        // ('/x'y' seria un literal roto). Verificamos que aparece la forma segura y NO
        // el literal roto.
        $this->blade('<x-tabler::dropzone :url="\'/x\\\'y\'" />')
            ->assertSee("url: '\\/x\\u0027y'", false)
            ->assertDontSee("url: '/x'y'", false);
    }
}
