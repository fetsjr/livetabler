<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class AutocompleteTest extends TestCase
{
    public function test_renderiza_form_select(): void
    {
        $this->blade('<x-tabler::autocomplete name="pais" />')
            ->assertSee('form-select', false)
            ->assertSee('name="pais"', false);
    }

    public function test_muestra_label_cuando_se_indica(): void
    {
        $this->blade('<x-tabler::autocomplete name="pais" label="País" />')
            ->assertSee('form-label', false)
            ->assertSee('País');
    }

    public function test_renderiza_options(): void
    {
        $this->blade('<x-tabler::autocomplete name="pais" :options="[\'mx\' => \'México\', \'es\' => \'España\']" />')
            ->assertSee('<option value="mx">México</option>', false)
            ->assertSee('<option value="es">España</option>', false);
    }

    public function test_script_inicializa_tomselect_con_url_y_minchars(): void
    {
        // La url fluye al script via @js, que la escapa de forma segura (las barras como \/)
        // y la concatena con el query string. Asi una url con apostrofe no romperia el
        // literal JS. Verificamos la forma escapada real.
        $this->blade('<x-tabler::autocomplete name="pais" url="/buscar" :min-chars="2" />')
            ->assertSee('window.TomSelect', false)
            ->assertSee('new TomSelect', false)
            ->assertSee("var url = '\\/buscar' + '?q='", false)
            ->assertSee('query.length < 2', false);
    }

    public function test_escapa_url_con_apostrofe_en_el_script_js(): void
    {
        // Una url con apostrofe (url="/x'y") NO debe romper el literal JS: con @js el
        // apostrofe se escapa a ' dentro de la cadena. Verificamos la forma segura
        // y la ausencia del literal roto '/x'y'.
        $this->blade('<x-tabler::autocomplete name="pais" :url="\'/x\\\'y\'" />')
            ->assertSee("var url = '\\/x\\u0027y' + '?q='", false)
            ->assertDontSee("var url = '/x'y'", false);
    }

    public function test_estado_invalido_con_error(): void
    {
        $this->withViewErrors(['pais' => 'El país es obligatorio'])
            ->blade('<x-tabler::autocomplete name="pais" />')
            ->assertSee('is-invalid', false)
            ->assertSee('El país es obligatorio');
    }

    public function test_render_aislado_sin_errores_no_lanza(): void
    {
        // Sin withViewErrors el bag $errors no está compartido: el componente NO debe lanzar.
        $this->blade('<x-tabler::autocomplete name="pais" />')
            ->assertSee('form-select', false)
            ->assertDontSee('is-invalid', false);
    }
}
