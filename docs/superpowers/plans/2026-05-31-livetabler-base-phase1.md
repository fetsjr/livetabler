# Plan de implementación — LiveTabler Fase 1 (base + motor + playground) y Fase 2 (componente modelo `button`)

> **Para quien ejecuta (agente o persona):** SUB-SKILL REQUERIDA: usar `superpowers:subagent-driven-development` (recomendado) o `superpowers:executing-plans` para implementar este plan tarea por tarea. Los pasos usan checkbox (`- [ ]`).

**Goal:** Dejar la base de LiveTabler sobre el mecanismo estándar de Laravel (sintaxis `<x-tabler::...>`, sin TagCompiler copiado de Flux), con un playground local para ver los componentes, y reescribir `button` como componente modelo anónimo totalmente comentado en español.

**Architecture:** Componentes anónimos de Blade resueltos vía `Blade::anonymousComponentPath(..., 'tabler')`. Se elimina el `TablerTagCompiler` y los registros de clases PHP por componente. Sub-componentes con sintaxis de punto (`<x-tabler::accordion.item>`). Verificación con `orchestra/testbench` (tests + Workbench).

**Tech Stack:** PHP 8.5, Laravel 10–13, Blade, Tabler (Bootstrap 5), Orchestra Testbench, PHPUnit.

**Spec:** `docs/superpowers/specs/2026-05-31-livetabler-base-rewrite-design.md`

---

## Nota de diseño importante (refinamiento sobre el spec)

El spec (sección 3.2) pide eliminar las 35 clases PHP. Es viable y seguro **porque** Laravel
resuelve sub-componentes anónimos con **sintaxis de punto**: `<x-tabler::accordion.item>` mapea a
`accordion/item.blade.php`. Así, al borrar las clases, todos los componentes (incluidos los
anidados) siguen resolviendo vía `anonymousComponentPath`. El único cambio de API es que los
sub-componentes pasan de `accordion-item` a `accordion.item` (igual que Flux). Esto se documenta
en `docs/conventions.md` (Tarea 7).

---

## Estructura de archivos resultante

```
composer.json                    # + require-dev (testbench/phpunit), autoload-dev, scripts
phpunit.xml                      # NUEVO: config de PHPUnit
testbench.yaml                   # NUEVO: config del Workbench (provider + ruta de inicio)
src/
  TablerServiceProvider.php      # MODIFICADO: sin TagCompiler ni Blade::component(); path actualizado
  TablerTagCompiler.php          # ELIMINADO
  View/Components/*.php           # ELIMINADO (35 clases)
resources/
  views/components/              # MOVIDO desde stubs/resources/views/tabler/
    button/index.blade.php       # REESCRITO (componente modelo, Tarea 6)
tests/
  TestCase.php                   # NUEVO: base de tests (testbench + workbench)
  Feature/EngineTest.php         # NUEVO: el motor resuelve componentes anónimos
  Feature/ButtonTest.php         # NUEVO: tests del componente modelo
  Feature/PlaygroundTest.php     # NUEVO: la ruta del playground responde 200
workbench/
  routes/web.php                 # NUEVO: ruta '/' del playground
  resources/views/demo.blade.php # NUEVO: página demo de componentes
docs/
  conventions.md                 # NUEVO: convenciones del patrón modelo
```

---

## Task 1: Herramientas de desarrollo (Testbench + PHPUnit)

**Files:**
- Modify: `composer.json`
- Create: `phpunit.xml`
- Create: `tests/TestCase.php`

- [ ] **Step 1: Añadir dependencias de desarrollo y autoload-dev a `composer.json`**

Modificar `composer.json` para añadir, después del bloque `"autoload"`, estos bloques (mantener el resto igual):

```json
    "autoload-dev": {
        "psr-4": {
            "Tabler\\Tests\\": "tests/",
            "Tabler\\Workbench\\": "workbench/app/"
        }
    },
    "require-dev": {
        "orchestra/testbench": "^9.0|^10.0",
        "phpunit/phpunit": "^10.5|^11.0"
    },
    "scripts": {
        "test": "phpunit",
        "serve": "@php vendor/bin/testbench serve"
    },
    "config": {
        "sort-packages": true
    },
    "minimum-stability": "stable",
    "prefer-stable": true
```

- [ ] **Step 2: Instalar dependencias**

Run: `composer update`
Expected: descarga `orchestra/testbench`, `phpunit/phpunit` y dependencias de Laravel; crea `vendor/` y `composer.lock`. Sin errores de resolución.

Si la resolución falla por versiones, ejecutar en su lugar:
`composer require --dev "orchestra/testbench" "phpunit/phpunit" -W`
(deja que Composer elija las versiones compatibles con PHP 8.5).

- [ ] **Step 3: Crear `phpunit.xml`**

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="vendor/phpunit/phpunit/phpunit.xsd"
         bootstrap="vendor/autoload.php"
         colors="true">
    <testsuites>
        <testsuite name="LiveTabler">
            <directory>tests</directory>
        </testsuite>
    </testsuites>
    <source>
        <include>
            <directory>src</directory>
        </include>
    </source>
</phpunit>
```

- [ ] **Step 4: Crear `tests/TestCase.php`**

```php
<?php

namespace Tabler\Tests;

use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Tabler\TablerServiceProvider;

/**
 * Clase base para todas las pruebas de LiveTabler.
 *
 * Usa Orchestra Testbench para arrancar una mini-aplicación Laravel en memoria
 * y registra el proveedor de servicios de la librería. El trait WithWorkbench
 * carga además las rutas y vistas del playground (carpeta workbench/).
 */
class TestCase extends BaseTestCase
{
    use WithWorkbench;

    /**
     * Proveedores de servicios que se registran en la app de pruebas.
     */
    protected function getPackageProviders($app): array
    {
        return [
            TablerServiceProvider::class,
        ];
    }
}
```

- [ ] **Step 5: Verificar que PHPUnit arranca**

Run: `vendor/bin/phpunit`
Expected: "No tests executed!" o equivalente (0 tests, sin errores de carga ni de proveedor).

- [ ] **Step 6: Commit**

```bash
git add composer.json composer.lock phpunit.xml tests/TestCase.php
git commit -m "build: configura Testbench y PHPUnit para desarrollo del paquete"
```

---

## Task 2: Test de caracterización del render actual de `button`

Antes de tocar el motor, fijamos el comportamiento observable: `<x-tabler::button>` debe renderizar un botón con clase `btn btn-primary` y mostrar su contenido.

**Files:**
- Create: `tests/Feature/EngineTest.php`

- [ ] **Step 1: Escribir el test de caracterización**

```php
<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class EngineTest extends TestCase
{
    /**
     * Comprobamos que el componente button se renderiza con la sintaxis
     * estándar de Laravel <x-tabler::button> y produce las clases base de Tabler.
     */
    public function test_button_se_renderiza_con_sintaxis_estandar(): void
    {
        $this->blade('<x-tabler::button>Guardar</x-tabler::button>')
            ->assertSee('btn', false)
            ->assertSee('btn-primary', false)
            ->assertSee('Guardar');
    }
}
```

- [ ] **Step 2: Ejecutar el test (debe PASAR con el motor actual)**

Run: `vendor/bin/phpunit --filter test_button_se_renderiza_con_sintaxis_estandar`
Expected: PASS (hoy resuelve vía la clase `Button` registrada). Este test es la red de seguridad para el refactor del motor.

- [ ] **Step 3: Commit**

```bash
git add tests/Feature/EngineTest.php
git commit -m "test: caracteriza el render de button antes de limpiar el motor"
```

---

## Task 3: Limpiar el motor (quitar TagCompiler, mover vistas, borrar clases)

**Files:**
- Delete: `src/TablerTagCompiler.php`
- Delete: `src/View/Components/` (35 archivos)
- Modify: `src/TablerServiceProvider.php`
- Move: `stubs/resources/views/tabler/` → `resources/views/components/`

- [ ] **Step 1: Mover las vistas a la ubicación canónica**

```bash
git mv stubs/resources/views/tabler resources/views/components
```

Expected: la carpeta `resources/views/components/` contiene `button/`, `alert/`, `accordion/`, etc.

- [ ] **Step 2: Eliminar el TagCompiler y las clases PHP de componentes**

```bash
git rm src/TablerTagCompiler.php
git rm -r src/View
```

Expected: ambos eliminados del índice de git.

- [ ] **Step 3: Reescribir `src/TablerServiceProvider.php`**

Reemplazar TODO el contenido del archivo por:

```php
<?php

namespace Tabler;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

/**
 * Proveedor de servicios de LiveTabler.
 *
 * Registra los componentes Blade de la librería usando exclusivamente el
 * mecanismo estándar de Laravel: una ruta de componentes anónimos con el
 * prefijo "tabler". No se usa ningún compilador de etiquetas personalizado;
 * los componentes se escriben con la sintaxis nativa <x-tabler::nombre>.
 */
class TablerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->bootComponentes();
        $this->bootDirectivas();
        $this->bootPublicacion();
    }

    /**
     * Registra la ruta de componentes anónimos.
     *
     * Gracias a esto, <x-tabler::button> resuelve a
     * resources/views/components/button/index.blade.php, y los sub-componentes
     * con notación de punto: <x-tabler::accordion.item> -> accordion/item.blade.php.
     */
    protected function bootComponentes(): void
    {
        $ruta = __DIR__.'/../resources/views/components';

        // Permite cargar las vistas también como tabler::... si hiciera falta.
        $this->loadViewsFrom($ruta, 'tabler');

        // Habilita la sintaxis de componente anónimo <x-tabler::...>.
        Blade::anonymousComponentPath($ruta, 'tabler');
    }

    /**
     * Registra las directivas Blade para inyectar los estilos y scripts de Tabler.
     */
    protected function bootDirectivas(): void
    {
        // @tablerStyles imprime las hojas de estilo publicadas de Tabler.
        Blade::directive('tablerStyles', function () {
            return <<<'HTML'
                <link rel="stylesheet" href="{{ asset('vendor/tabler/tabler.min.css') }}">
                <link rel="stylesheet" href="{{ asset('vendor/tabler/tabler-vendors.min.css') }}">
            HTML;
        });

        // @tablerScripts imprime el JavaScript publicado de Tabler.
        Blade::directive('tablerScripts', function () {
            return '<script src="{{ asset(\'vendor/tabler/tabler.js\') }}" defer></script>';
        });
    }

    /**
     * Declara los assets publicables (CSS, JS y fuentes) bajo la etiqueta "tabler-assets".
     */
    protected function bootPublicacion(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/css' => public_path('vendor/tabler'),
                __DIR__.'/../resources/js' => public_path('vendor/tabler'),
                __DIR__.'/../resources/fonts' => public_path('vendor/fonts'),
            ], 'tabler-assets');
        }
    }
}
```

- [ ] **Step 4: Ejecutar el test de caracterización (debe seguir PASANDO, ahora vía componente anónimo)**

Run: `vendor/bin/phpunit --filter test_button_se_renderiza_con_sintaxis_estandar`
Expected: PASS. Ahora `<x-tabler::button>` resuelve al Blade anónimo `button/index.blade.php` sin clase PHP.

- [ ] **Step 5: Añadir un test que confirme la resolución de un sub-componente anidado**

Añadir a `tests/Feature/EngineTest.php`, dentro de la clase:

```php
    /**
     * Los sub-componentes anidados se resuelven con notación de punto:
     * <x-tabler::accordion.item> -> accordion/item.blade.php.
     */
    public function test_subcomponente_anidado_se_resuelve_con_punto(): void
    {
        $vista = $this->blade('<x-tabler::accordion.item heading="Sección">Contenido</x-tabler::accordion.item>');

        // Solo verificamos que renderiza sin lanzar excepción y muestra su contenido.
        $vista->assertSee('Contenido');
    }
```

- [ ] **Step 6: Ejecutar toda la suite**

Run: `vendor/bin/phpunit`
Expected: PASS (ambos tests de EngineTest en verde).

Si `accordion.item` lanzara una excepción por una variable no definida, ajustar SOLO ese stub
añadiendo el default defensivo correspondiente (`$x = $x ?? null;`). No reescribir el componente
todavía: su reescritura formal ocurre en la Fase 3.

- [ ] **Step 7: Commit**

```bash
git add -A
git commit -m "refactor: motor 100% Laravel estandar (sin TagCompiler ni clases PHP)"
```

---

## Task 4: Playground local (Workbench)

**Files:**
- Create: `testbench.yaml`
- Create: `workbench/routes/web.php`
- Create: `workbench/resources/views/demo.blade.php`
- Create: `tests/Feature/PlaygroundTest.php`

- [ ] **Step 1: Crear `testbench.yaml`**

```yaml
# Configuración del Workbench de Orchestra Testbench.
# Levanta una mini-app Laravel que carga LiveTabler para ver los componentes.
providers:
  - Tabler\TablerServiceProvider

workbench:
  start: '/'
  install: true
  discovers:
    web: true
    views: true
```

- [ ] **Step 2: Crear la ruta del playground `workbench/routes/web.php`**

```php
<?php

use Illuminate\Support\Facades\Route;

/**
 * Ruta de inicio del playground.
 * Muestra una página con ejemplos de los componentes de LiveTabler.
 */
Route::get('/', function () {
    return view('demo');
});
```

- [ ] **Step 3: Crear la vista demo `workbench/resources/views/demo.blade.php`**

```blade
<!DOCTYPE html>
<html lang="es" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LiveTabler · Playground</title>
    {{-- Inyecta los estilos de Tabler publicados --}}
    @tablerStyles
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4">LiveTabler · Playground</h1>

        {{-- Sección: botones --}}
        <div class="card">
            <div class="card-header"><h3 class="card-title">Botón</h3></div>
            <div class="card-body d-flex flex-wrap gap-2">
                <x-tabler::button>Primario</x-tabler::button>
                <x-tabler::button variant="secondary">Secundario</x-tabler::button>
                <x-tabler::button variant="outline" color="primary">Outline</x-tabler::button>
                <x-tabler::button variant="ghost" color="danger">Ghost</x-tabler::button>
                <x-tabler::button variant="link">Enlace</x-tabler::button>
                <x-tabler::button size="lg">Grande</x-tabler::button>
                <x-tabler::button size="sm">Pequeño</x-tabler::button>
                <x-tabler::button :loading="true">Cargando</x-tabler::button>
                <x-tabler::button as="a" href="#">Como enlace</x-tabler::button>
            </div>
        </div>
    </div>
    {{-- Inyecta el JS de Tabler publicado --}}
    @tablerScripts
</body>
</html>
```

- [ ] **Step 4: Crear el test del playground `tests/Feature/PlaygroundTest.php`**

```php
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
```

- [ ] **Step 5: Ejecutar el test del playground**

Run: `vendor/bin/phpunit --filter test_la_ruta_del_playground_responde`
Expected: PASS. (El trait `WithWorkbench` carga la ruta y la vista del Workbench.)

Si la ruta devuelve 404, ejecutar una vez `vendor/bin/testbench workbench:install --no-interaction`
y reintentar; comprobar que `testbench.yaml` tiene `workbench.discovers.web: true`.

- [ ] **Step 6: Verificación visual manual (opcional, recomendada)**

Run: `vendor/bin/testbench serve`
Expected: sirve en `http://127.0.0.1:8000`. Abrir en el navegador y ver la tarjeta "Botón" con los
ejemplos. Detener con Ctrl+C.

- [ ] **Step 7: Commit**

```bash
git add testbench.yaml workbench tests/Feature/PlaygroundTest.php
git commit -m "feat: playground local con Testbench Workbench para ver componentes"
```

---

## Task 5: Reescribir `button` como componente modelo (TDD)

Reescribimos `resources/views/components/button/index.blade.php` como el estándar de oro:
componente anónimo con `@props`, comentado en español, clases reales de Tabler.

**Files:**
- Modify: `resources/views/components/button/index.blade.php`
- Create: `tests/Feature/ButtonTest.php`

- [ ] **Step 1: Escribir los tests del botón**

```php
<?php

namespace Tabler\Tests\Feature;

use Tabler\Tests\TestCase;

class ButtonTest extends TestCase
{
    public function test_variante_primary_por_defecto(): void
    {
        $this->blade('<x-tabler::button>OK</x-tabler::button>')
            ->assertSee('btn btn-primary', false);
    }

    public function test_variante_secondary(): void
    {
        $this->blade('<x-tabler::button variant="secondary">OK</x-tabler::button>')
            ->assertSee('btn-secondary', false);
    }

    public function test_variante_outline_usa_color(): void
    {
        $this->blade('<x-tabler::button variant="outline" color="danger">OK</x-tabler::button>')
            ->assertSee('btn-outline-danger', false);
    }

    public function test_variante_ghost_usa_color(): void
    {
        $this->blade('<x-tabler::button variant="ghost" color="success">OK</x-tabler::button>')
            ->assertSee('btn-ghost-success', false);
    }

    public function test_variante_link(): void
    {
        $this->blade('<x-tabler::button variant="link">OK</x-tabler::button>')
            ->assertSee('btn-link', false);
    }

    public function test_color_directo_como_variante(): void
    {
        $this->blade('<x-tabler::button variant="warning">OK</x-tabler::button>')
            ->assertSee('btn-warning', false);
    }

    public function test_tamano_lg(): void
    {
        $this->blade('<x-tabler::button size="lg">OK</x-tabler::button>')
            ->assertSee('btn-lg', false);
    }

    public function test_tamano_md_no_anade_clase(): void
    {
        $this->blade('<x-tabler::button size="md">OK</x-tabler::button>')
            ->assertDontSee('btn-md', false);
    }

    public function test_estado_loading(): void
    {
        $this->blade('<x-tabler::button :loading="true">OK</x-tabler::button>')
            ->assertSee('btn-loading', false)
            ->assertSee('disabled', false);
    }

    public function test_pill_y_square(): void
    {
        $this->blade('<x-tabler::button :pill="true" :square="true">OK</x-tabler::button>')
            ->assertSee('btn-pill', false)
            ->assertSee('btn-square', false);
    }

    public function test_se_renderiza_como_enlace_con_href(): void
    {
        $html = $this->blade('<x-tabler::button href="/panel">Ir</x-tabler::button>')->__toString();

        $this->assertStringContainsString('<a', $html);
        $this->assertStringContainsString('href="/panel"', $html);
    }

    public function test_como_boton_lleva_type(): void
    {
        $this->blade('<x-tabler::button type="submit">Enviar</x-tabler::button>')
            ->assertSee('type="submit"', false);
    }

    public function test_icono_no_lanza_excepcion(): void
    {
        $this->blade('<x-tabler::button icon="home">Inicio</x-tabler::button>')
            ->assertSee('ti-home', false)
            ->assertSee('Inicio');
    }
}
```

- [ ] **Step 2: Ejecutar los tests (deben FALLAR donde el stub actual no cumple)**

Run: `vendor/bin/phpunit --filter ButtonTest`
Expected: FAIL en varios casos (el stub actual no usa `@props`, mapea distinto algunas variantes y mezcla defaults defensivos). Esto confirma qué debe cumplir la reescritura.

- [ ] **Step 3: Reescribir el Blade del botón**

Reemplazar TODO el contenido de `resources/views/components/button/index.blade.php` por:

```blade
@props([
    // Variante visual del botón.
    // Valores especiales: 'outline', 'ghost', 'link'. Cualquier otro valor se trata como
    // un color de Tabler directo (p. ej. variant="danger" -> btn-danger).
    'variant' => 'primary',

    // Color base de Tabler usado por las variantes 'outline' y 'ghost'
    // (primary, secondary, success, danger, warning, info...).
    'color' => 'primary',

    // Tamaño del botón: 'sm' | 'md' | 'lg'. 'md' es el tamaño normal y no añade clase.
    'size' => 'md',

    // Nombre del icono Tabler que se muestra ANTES del texto (sin el prefijo "ti-").
    'icon' => null,

    // Nombre del icono Tabler que se muestra DESPUÉS del texto.
    'iconTrailing' => null,

    // Si es true, muestra el indicador de carga y deshabilita el botón.
    'loading' => false,

    // Bordes completamente redondeados (forma de píldora).
    'pill' => false,

    // Botón cuadrado (mismo alto y ancho), ideal para botones de solo icono.
    'square' => false,

    // Si se indica, el componente se renderiza como enlace <a> hacia esta URL.
    'href' => null,

    // Etiqueta HTML a usar: 'button' o 'a'. Si hay href, se fuerza a 'a'.
    'as' => 'button',

    // Tipo del botón cuando se renderiza como <button>: 'button' | 'submit' | 'reset'.
    'type' => 'button',
])

@php
    // Si se pasa href, el botón SIEMPRE se renderiza como enlace <a>.
    $etiqueta = $href !== null ? 'a' : $as;

    // ¿El botón tiene texto/contenido? Si no, lo tratamos como botón de solo icono.
    $tieneTexto = ! $slot->isEmpty();

    // Traducimos la variante a la clase de color de Tabler correspondiente.
    $claseVariante = match ($variant) {
        'outline' => 'btn-outline-'.$color,   // botón con borde de color y fondo transparente
        'ghost'   => 'btn-ghost-'.$color,     // botón sin fondo que se colorea al pasar el ratón
        'link'    => 'btn-link',              // se ve como un enlace de texto
        default   => 'btn-'.$variant,         // 'primary', 'secondary' o un color directo
    };
@endphp

<{{ $etiqueta }}
    @class([
        'btn',                                              // clase base de Tabler
        'btn-'.$size => $size !== 'md',                     // btn-sm / btn-lg (md no añade clase)
        'btn-pill' => $pill,                                // forma de píldora
        'btn-square' => $square,                            // botón cuadrado
        'btn-icon' => ! $tieneTexto && ($icon || $loading),// botón de solo icono
        'btn-loading disabled' => $loading,                // estado de carga (deshabilitado)
        $claseVariante,                                     // clase de color/variante calculada
    ])
    @if ($etiqueta === 'a')
        href="{{ $href ?? '#' }}"
    @else
        type="{{ $type }}"
    @endif
    {{ $attributes }}
>
    {{-- Icono inicial (no se muestra mientras carga, para no chocar con el spinner) --}}
    @if ($icon && ! $loading)
        <x-tabler::icon :name="$icon" @class(['me-2' => $tieneTexto]) />
    @endif

    {{ $slot }}

    {{-- Icono final --}}
    @if ($iconTrailing && ! $loading)
        <x-tabler::icon :name="$iconTrailing" @class(['ms-2' => $tieneTexto]) />
    @endif
</{{ $etiqueta }}>
```

- [ ] **Step 4: Ejecutar los tests del botón (deben PASAR)**

Run: `vendor/bin/phpunit --filter ButtonTest`
Expected: PASS en los 13 tests.

- [ ] **Step 5: Ejecutar TODA la suite (sin regresiones)**

Run: `vendor/bin/phpunit`
Expected: PASS en EngineTest, PlaygroundTest y ButtonTest.

- [ ] **Step 6: Commit**

```bash
git add resources/views/components/button/index.blade.php tests/Feature/ButtonTest.php
git commit -m "feat: reescribe button como componente modelo anonimo (props + Tabler)"
```

---

## Task 6: Documentar las convenciones del patrón modelo

**Files:**
- Create: `docs/conventions.md`

- [ ] **Step 1: Crear `docs/conventions.md`**

```markdown
# Convenciones de componentes — LiveTabler

Toda la librería sigue estas reglas. El componente de referencia es
`resources/views/components/button/index.blade.php`.

## 1. Tipo de componente
- Componentes **anónimos** de Blade (sin clase PHP).
- Una sola fuente de verdad para los valores por defecto: el bloque `@props([...])`.

## 2. Nombres (API en inglés)
- Etiqueta: `<x-tabler::nombre>`.
- Sub-componentes con notación de punto: `<x-tabler::accordion.item>` (archivo `accordion/item.blade.php`).
- Props en inglés: `variant`, `size`, `loading`, `href`...

## 3. Comentarios
- **Siempre en español**, explicando *qué hace* cada prop y cada bloque de lógica.

## 4. Estructura interna
1. `@props([...])` con un comentario por prop.
2. Bloque `@php` para calcular variables derivadas (etiqueta a usar, clases calculadas...).
3. Construcción de clases con la directiva nativa `@class([...])` (NO un ClassBuilder propio).
4. Markup con clases reales de **Tabler / Bootstrap 5**, tomadas de la documentación de Tabler.

## 5. Estilos
- Solo clases de Tabler/Bootstrap 5 (`btn`, `bg-primary-lt`, `mb-3`, `g-2`...).
- Variantes de color mapeadas a Tabler (`btn-outline-primary`, `btn-ghost-danger`...).
- Compatibilidad con dark mode (`data-bs-theme`) y diseño responsive (mobile-first).

## 6. Formularios
- Integrar `@error` con las clases `is-invalid` / `invalid-feedback`.

## 7. JavaScript
- Si un componente necesita JS de Tabler, debe auto-inicializarse cuando la librería esté
  presente en la página (sin configuración manual del usuario).

## 8. Origen del markup
- Cada componente se escribe desde la **documentación de Tabler**, nunca adaptando el Blade de Flux.
```

- [ ] **Step 2: Commit**

```bash
git add docs/conventions.md
git commit -m "docs: convenciones del patron modelo de componentes"
```

---

## Verificación final de la fase

- [ ] **Step 1: Ejecutar toda la suite**

Run: `vendor/bin/phpunit`
Expected: todos los tests en verde.

- [ ] **Step 2: Levantar el playground y revisar el botón visualmente**

Run: `vendor/bin/testbench serve`
Expected: en `http://127.0.0.1:8000` se ve la tarjeta "Botón" con todas las variantes bien renderizadas.

- [ ] **Step 3: Confirmar que `/codigo` sigue ignorado**

Run: `git status --short`
Expected: no aparece nada de `codigo/`.

---

## Resultado de la fase

- Motor 100% Laravel estándar, sin `TablerTagCompiler` ni clases PHP duplicadas.
- `<x-tabler::button>` y sub-componentes `<x-tabler::accordion.item>` resuelven como anónimos.
- Playground local funcionando para ver componentes sin tocar github/Sail.
- `button` reescrito como componente modelo, comentado en español, con tests.
- Convenciones documentadas para guiar la migración (Fase 3).
```
