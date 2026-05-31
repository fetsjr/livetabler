# Diseño: Reescritura de la base de LiveTabler

**Fecha:** 2026-05-31
**Paquete:** `fetsjr/livetabler` (namespace `Tabler\`)
**Estado:** Aprobado para planificación

---

## 1. Objetivo

Convertir LiveTabler en una librería de componentes UI para Laravel + Livewire que ofrezca
una experiencia de desarrollo parecida a [Flux](https://fluxui.dev), pero construida sobre
[Tabler](https://tabler.io) (Bootstrap 5) en lugar de Tailwind/Flux.

La librería debe:

- Funcionar con la sintaxis estándar de Laravel: `<x-tabler::button ... />`.
- Tener una **API pública en inglés** (nombres de etiquetas y props), familiar para el
  ecosistema Laravel y con mapeo mental directo con Flux.
- Tener **todos los comentarios del código en español**, explicando *qué hace* cada bloque.
- Usar markup y clases **reales de Tabler/Bootstrap 5**, reescritos desde la documentación
  de Tabler — **no** adaptados del Blade de Flux.

### No-objetivos (fuera de alcance de este spec)

- No copiar el código de Flux (ni motor, ni HTML, ni lógica de componentes).
- No publicar todavía los componentes como "stubs" personalizables (queda para el futuro).
- No migrar los ~35 componentes de golpe; este spec define la **base** y el **patrón modelo**;
  la migración se hace por lotes en planes posteriores.

---

## 2. Decisiones tomadas (brainstorming)

| Tema | Decisión |
|------|----------|
| Motor de componentes | **Laravel estándar.** Eliminar el `TablerTagCompiler` (copiado de Flux). Usar la sintaxis nativa `<x-tabler::button>`. |
| Idioma de la API | **Inglés** (`button`, `variant`, `loading`...). |
| Idioma de comentarios | **Español**, bien explicados. |
| Punto de partida | **Empezar de cero con base sólida**: convenciones + 1 componente modelo perfecto, luego migrar el resto. |
| Markup | **Tabler / Bootstrap 5** original, reescrito desde su documentación. |
| Verificación visual | **Playground local** con `orchestra/testbench` (Workbench), no round-trip a github/Sail. |
| Tipo de componente | **Componentes anónimos de Blade** con `@props([...])` (sin clase PHP duplicada), salvo casos con lógica pesada. |

---

## 3. Arquitectura del motor

### 3.1 Cómo se resuelve `<x-tabler::button>`

El `TablerServiceProvider` ya registra:

```php
Blade::anonymousComponentPath(__DIR__.'/../resources/views/components', 'tabler');
```

Esto hace que `<x-tabler::button>` resuelva al archivo
`resources/views/components/button/index.blade.php` (o `button.blade.php`).
**No se necesita ningún tag compiler personalizado.** El `TablerTagCompiler` solo existía
para permitir omitir la `x-` (un truco específico de Flux); al quitarlo, la librería usa
exclusivamente el mecanismo oficial de Laravel.

### 3.2 Qué se elimina

- `src/TablerTagCompiler.php` (motor copiado de Flux).
- El método `bootTagCompiler()` en `TablerServiceProvider`.
- Los registros `Blade::component('tabler::...', Clase::class)` del service provider.
- Las clases PHP de `src/View/Components/*.php` (35 archivos), salvo las que tengan lógica
  real que no quepa en Blade (se evalúa caso por caso; objetivo: 0 a 2 clases).

### 3.3 Qué se conserva

- `src/TablerServiceProvider.php` (limpio): registra el path de componentes, las directivas
  `@tablerStyles` / `@tablerScripts`, y la publicación de assets (`tabler-assets`).
- `src/helpers.php`.
- `resources/css`, `resources/js`, `resources/fonts` (assets de Tabler).

### 3.4 Por qué esto elimina los errores "Undefined Variable"

Hoy cada componente define defaults **dos veces** (en la clase PHP y otra vez con `$x ?? null`
en el Blade), lo que genera fragilidad y excepciones. Con componentes anónimos, los defaults
se declaran **una sola vez** en `@props([...])`. Una sola fuente de verdad → sin variables
indefinidas.

---

## 4. Estructura de carpetas (objetivo)

```
src/
  TablerServiceProvider.php      # registro de namespace, assets y directivas
  helpers.php
resources/
  views/components/              # FUENTE CANÓNICA de los componentes (movida desde stubs/)
    button/index.blade.php
    alert/index.blade.php
    ...
  css/  js/  fonts/              # assets de Tabler (ya existen)
workbench/                       # mini-app Laravel (testbench) para demos en localhost
docs/
  superpowers/specs/            # este spec
  conventions.md                # convenciones del patrón modelo (se crea con el componente button)
stubs/                          # reservado para futura publicación/personalización
codigo/                         # SOLO referencia local (Flux/Tabler), en .gitignore
```

**Nota sobre `stubs/`:** hoy las vistas viven en `stubs/resources/views/tabler`. Se moverán a
`resources/views/components` (convención de paquetes Laravel). Como la mayoría se reescribirá
durante la migración, el costo de mover es bajo. El path de `anonymousComponentPath` se
actualiza para apuntar a la nueva ubicación.

---

## 5. Convenciones del componente (patrón modelo)

Todo componente sigue **siempre** esta plantilla:

1. **`@props([...])`** al inicio, con default y comentario en español por cada prop.
2. **Construcción de clases** con la directiva nativa `@class([...])` de Laravel
   (no un `ClassBuilder` copiado de Flux).
3. **Clases reales de Tabler/Bootstrap 5** (`btn`, `btn-primary`, `bg-primary-lt`,
   `text-secondary`, `mb-3`, `g-2`...), reescritas desde la documentación de Tabler.
4. **Estados de validación** en componentes de formulario: integrar `@error` con
   `is-invalid` / `invalid-feedback`.
5. **Dark mode** y **responsive** (mobile-first) compatibles.
6. **API en inglés**, **comentarios en español** explicando cada bloque.
7. **JS auto-inicializable**: si un componente necesita JS de Tabler, debe inicializarse solo
   cuando la librería esté disponible en la página (sin configuración manual del usuario).

Estas reglas se documentan en `docs/conventions.md` cuando se construya el componente modelo.

---

## 6. Componente modelo: `button`

Se reescribe `<x-tabler::button>` como el "estándar de oro":

- Componente anónimo, `@props` con: `variant`, `size`, `icon`, `iconTrailing`, `loading`,
  `pill`, `square`, `href`, `as`, `type` (nombres en inglés, comentarios en español).
- Mapeo de `variant`/`color` a clases Tabler (`btn-primary`, `btn-outline-primary`,
  `btn-ghost-primary`, `btn-link`...).
- Detección de botón solo-icono, estado `loading`, formas `pill`/`square`.
- Render como `<button>` o `<a>` según `as`/`href`.
- Totalmente comentado en español.

Sirve de referencia visual y de código para migrar el resto.

---

## 7. Verificación: playground (Workbench)

- Añadir `orchestra/testbench` como dependencia de desarrollo en `composer.json`.
- Crear `workbench/` con una mini-app Laravel que cargue el `TablerServiceProvider`.
- Página(s) demo que rendericen cada componente con sus variantes.
- Flujo de desarrollo: `composer install` → servir el workbench → ver en `localhost`.
- Cuando un lote esté sólido: `git push` y `composer require`/path-repository en el proyecto
  Sail del usuario para la prueba de integración final.

---

## 8. Estrategia de migración (fases)

Cada fase es un plan de implementación separado.

1. **Base + motor + playground**
   - Eliminar `TablerTagCompiler` y limpiar `TablerServiceProvider`.
   - Mover vistas a `resources/views/components`.
   - Eliminar clases PHP duplicadas.
   - Montar el Workbench y dejar `composer install` funcionando.
2. **Componente modelo + convenciones**
   - Reescribir `button` como estándar de oro.
   - Escribir `docs/conventions.md`.
3. **Migración por lotes** (sobre el estándar; cada componente reescrito desde Tabler,
   comentado en español y verificado en el playground):
   - Lote A — Formularios: `input`, `select`, `checkbox`, `textarea`, `radio`, `switch`, `field`.
   - Lote B — Layout: `layout`, `navbar`, `sidebar`, `page-header`, `page-body`, `card`.
   - Lote C — Feedback: `alert`, `badge`, `progress`, `skeleton`, `status`, `modal`, `toast`.
   - Lote D — Datos: `table`, `datatable`, `avatar`, `timeline`, `steps`, `breadcrumb`, `accordion`.
   - Lote E — Avanzados: `datepicker`, `autocomplete`, `dropdown`, `chart`, `dropzone`, `ribbon`.

   *(El detalle y orden exacto de cada lote se define en su propio plan; esta lista es guía.)*

---

## 9. Criterios de éxito

- `<x-tabler::button>` renderiza correctamente sin tag compiler personalizado.
- No quedan clases PHP que dupliquen defaults de Blade (salvo excepciones justificadas).
- No hay código del motor de Flux (`TablerTagCompiler`) en el repositorio.
- El componente modelo `button` está reescrito desde Tabler y comentado 100% en español.
- El playground levanta en `localhost` y muestra los componentes ya migrados.
- `codigo/` permanece fuera del control de versiones.

---

## 10. Riesgos y mitigaciones

| Riesgo | Mitigación |
|--------|-----------|
| Mover 270 archivos rompe rutas | Se actualiza `anonymousComponentPath`; muchos archivos se reescriben de todos modos. |
| Componentes que sí necesitan PHP | Se evalúan caso por caso; se permite clase PHP solo con justificación. |
| Parecido accidental con Blade de Flux | Cada componente se reescribe desde la documentación de Tabler, no desde el Blade de Flux. |
| Workbench añade complejidad | Es dependencia **solo de desarrollo**; no afecta a quien consume la librería. |
