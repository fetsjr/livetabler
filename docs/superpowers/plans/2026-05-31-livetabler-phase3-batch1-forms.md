# Plan — LiveTabler Fase 3, Lote 1: icon + formularios

> **Para quien ejecuta:** se implementa componente por componente con TDD (test primero), siguiendo `docs/conventions.md`. El componente de referencia es `resources/views/components/button/index.blade.php`.

**Goal:** Migrar al estándar nuevo (componente anónimo `@props`, comentarios en español, API en inglés, fusión de atributos vía `$attributes`, clases reales de Tabler, integración `@error`, con test) los componentes: `icon`, `field`, `label`, `input`, `textarea`, `checkbox`, `switch`, `radio`, `select`.

**Arquitectura:** Cada componente vive en `resources/views/components/<nombre>/index.blade.php` (o `<nombre>.blade.php` para los de un solo archivo). Cada uno lleva su test en `tests/Feature/`. El markup correcto se toma de la documentación de Tabler en `codigo/tabler-dev/docs/content/ui/forms/` (carpeta de referencia local; NO copiar de Flux).

## Recipe por componente (aplicar SIEMPRE)
1. Escribir/actualizar el test en `tests/Feature/<Nombre>Test.php` PRIMERO; correrlo y verlo fallar.
2. Reescribir el Blade:
   - `@props([...])` con un comentario en español por prop. Defaults una sola vez.
   - `@php` solo para variables derivadas.
   - Etiqueta raíz fusiona clases/atributos con `{{ $attributes->class([...])->merge([...]) }}` (NUNCA `@class` suelto + `{{ $attributes }}` en la raíz).
   - Clases reales de Tabler/Bootstrap 5 verificadas contra `codigo/tabler-dev/docs/content/ui/forms/`.
   - Integrar validación con `@error($name)` -> `is-invalid` + `invalid-feedback` cuando aplique.
   - API en inglés, comentarios en español.
3. Correr el test del componente -> verde. Correr la suite completa -> sin regresiones.
4. Añadir el componente a la página demo del playground (`workbench/resources/views/demo.blade.php`) en su propia tarjeta.
5. Commit (un commit por componente): `feat: migra <nombre> al estandar de componente (props + Tabler)`.

## Orden y objetivo por componente

### 1. icon  (`resources/views/components/icon/index.blade.php`)
- Props: `name` (string, requerido, nombre del icono Tabler SIN prefijo `ti-`), `size` (int px para `font-size`, default 18).
- Render: `<i {{ $attributes->class(['icon','ti','ti-'.$name])->merge(['style'=>'font-size:'.$size.'px']) }}></i>`.
- Quitar el prop `stroke` (no aplica al webfont de Tabler Icons; solo confundía). Quitar el manejo manual de `$class`.
- Tests: nombre produce `ti-home`; size produce `font-size:24px`; clase del consumidor se fusiona (`<x-tabler::icon name="home" class="text-red"/>` -> una sola class con `ti-home` y `text-red`).

### 2. field  (`resources/views/components/field.blade.php`)
- Ya usa `@props(['variant'=>'block'])`. Añadir comentarios en español a la prop y a la lógica `match`. Mantener variants `block`(default `mb-3`), `inline`(`mb-3 row`), `bare`(sin clase).
- Test: variant default -> `mb-3`; `inline` -> `row`; `bare` -> sin `mb-3`; fusiona class del consumidor.

### 3. label  (`resources/views/components/label.blade.php`)
- Ya usa `@props`. Añadir comentarios en español. Mantener props `badge`, `aside`, `trailing`, `srOnly`.
- Test: render base -> `form-label`; `srOnly=true` -> `sr-only`; `badge="3"` -> aparece el badge.

### 4. input  (`resources/views/components/input/index.blade.php`)
- Props: `name` (string, default ''), `type` (default 'text'), `label` (null), `placeholder` (null), `icon` (null, icono Tabler de prefijo), `description` (null, texto de ayuda).
- Estructura: wrapper `mb-3`; `<label class="form-label">` si hay `label`; si hay `icon`, envolver en `<div class="input-icon">` con `<span class="input-icon-addon"><x-tabler::icon/></span>`; `<input class="form-control" @error is-invalid>`; `@error -> invalid-feedback`; `<small class="form-hint">` si hay `description`.
- El `<input>` debe fusionar atributos extra del consumidor (wire:model, required, value...) con `$attributes->whereDoesntStartWith([...])` o merge — preservar `wire:model`.
- Tests: render produce `form-control`; con `label` produce `form-label` + el texto; con `icon="user"` produce `input-icon` + `ti-user`; un error de validación produce `is-invalid` (usar `$this->withViewErrors([...])` o un MessageBag en el test).

### 5. textarea  (`resources/views/components/textarea.blade.php`)
- Props: `name` (''), `rows` (4), `invalid` (false). Mantener soporte `wire:model`.
- Render: `<textarea class="form-control" @error/invalid is-invalid>{{ $slot }}</textarea>` con merge de atributos y `name`/`id` si hay `name`.
- Tests: produce `form-control` y `rows="4"`; `invalid=true` -> `is-invalid`; slot se renderiza dentro.

### 6. checkbox  (`resources/views/components/checkbox/index.blade.php`)
- Props: `name` (''), `value` ('1'), `checked` (false), `label` (null), `description` (null).
- Render: `<label class="form-check">` con `<input type="checkbox" class="form-check-input">`, `form-check-label`, `form-check-description`. Soportar `wire:model`.
- Tests: produce `form-check` + `form-check-input`; `checked=true` -> `checked`; `label="Acepto"` -> texto + `form-check-label`.

### 7. switch  (`resources/views/components/switch.blade.php`)
- Igual que checkbox pero `class="form-check form-switch"`. Props: `name`, `label`, `description`, `checked`.
- Tests: produce `form-switch` + `form-check-input`; `checked` funciona.

### 8. radio  (`resources/views/components/radio/index.blade.php`)
- Props: `name` (''), `value` ('1'), `label` (null), `description` (null). `id` derivado de name+value.
- Render: `<label class="form-check">` con `<input type="radio" class="form-check-input">`. Soportar `wire:model`.
- Tests: produce `form-check` + `type="radio"`; `label` se renderiza.

### 9. select  (`resources/views/components/select/index.blade.php`)
- Props: `name` (''), `label` (null), `value` (null), `options` (array, `[valor=>texto]`), `placeholder` (''), `multiple` (false), `searchable` (false), `id` (auto).
- Render: wrapper `mb-3`; label opcional; `<select class="form-select" @error is-invalid>` con `multiple` y `name[]` si multiple; `<option>` por cada option marcando `selected`; placeholder como primer option vacío si no multiple; `@error invalid-feedback`; bloque `<script>` TomSelect SOLO si `searchable||multiple` (auto-init si `window.TomSelect`).
- Tests: produce `form-select`; con `options=['a'=>'A']` produce `<option value="a">A`; `value='a'` marca `selected`; `multiple=true` produce `multiple` y `name="x[]"`.

## Verificación final del lote
- `vendor/bin/phpunit` -> todo verde.
- `composer run serve` -> revisar las nuevas tarjetas en el playground.
