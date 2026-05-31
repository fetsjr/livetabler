# Convenciones de componentes — LiveTabler

Toda la librería sigue estas reglas. El componente de referencia (estándar de oro) es
`resources/views/components/button/index.blade.php`. Cuando crees o migres un componente,
cópialo como punto de partida.

## 1. Tipo de componente
- Componentes **anónimos** de Blade (sin clase PHP).
- Una sola fuente de verdad para los valores por defecto: el bloque `@props([...])`.
- Se resuelven vía `Blade::anonymousComponentPath` con el prefijo `tabler`.

## 2. Nombres (API en inglés)
- Etiqueta: `<x-tabler::nombre>`.
- Sub-componentes con notación de punto: `<x-tabler::accordion.item>` (archivo `accordion/item.blade.php`).
- Props en inglés: `variant`, `size`, `loading`, `href`...

## 3. Comentarios
- **Siempre en español**, explicando *qué hace* cada prop y cada bloque de lógica.

## 4. Estructura interna (en este orden)
1. `@props([...])` con un comentario por prop.
2. Bloque `@php` para calcular variables derivadas (etiqueta a usar, clases calculadas, atributos propios...).
3. La etiqueta raíz fusiona TODO a través del attribute bag (ver regla 5).
4. Contenido / slots, con los iconos o sub-elementos que correspondan.

## 5. Construcción de clases y atributos (MUY IMPORTANTE)
Para que quien usa el componente pueda añadir sus propias clases y atributos sin romper nada,
**siempre** se fusiona a través de `$attributes`. NUNCA se mezcla un `@class([...])` en la
etiqueta raíz con un `{{ $attributes }}` suelto: eso genera DOS atributos `class` y el
navegador descarta el del consumidor.

**Correcto** (un único atributo `class` fusionado):
```blade
<button {{ $attributes->class([
    'btn',                         // clase base
    'btn-'.$size => $size !== 'md',// clase condicional con clave
    $claseVariante,                // clase calculada (string siempre incluida)
])->merge(['type' => $type]) }}>
    {{ $slot }}
</button>
```

- `$attributes->class([...])` fusiona las clases calculadas con la `class="..."` del consumidor.
- `->merge([...])` añade atributos por defecto (como `type`/`href`) que el consumidor puede sobrescribir.
- Usa la sintaxis de array con claves para clases condicionales (`'clase' => $condicion`) y
  strings sueltos para clases que siempre van.
- `@class([...])` solo se usa en sub-elementos internos que NO son la etiqueta raíz (p. ej. el
  espaciado de un icono interno), nunca para fusionar con `$attributes` en la raíz.

## 6. Estilos
- Solo clases de Tabler/Bootstrap 5 (`btn`, `bg-primary-lt`, `mb-3`, `g-2`...).
- Variantes de color mapeadas a Tabler (`btn-outline-primary`, `btn-ghost-danger`...), normalmente
  con un `match` sobre la prop `variant`.
- Compatibilidad con dark mode (`data-bs-theme`) y diseño responsive (mobile-first).

## 7. Accesibilidad
- Un `<a>` no admite `disabled` real: si un enlace queda inutilizable (p. ej. cargando),
  añade `aria-disabled="true"` y `tabindex="-1"` además de la clase visual.
- Usa atributos ARIA y roles cuando el patrón de Tabler lo requiera.

## 8. Formularios
- Mostrar validación con las clases `is-invalid` (en el control) e `invalid-feedback` (el mensaje).
- **No uses `@error` directamente** en un componente de librería: compila a un `$errors->getBag()`
  sin proteger y lanza "Undefined variable $errors" cuando el componente se renderiza fuera de
  una petición web (tests aislados, Livewire inline, correos, consola). En una petición web real
  `$errors` siempre está compartido, así que el comportamiento es idéntico, pero el componente
  debe ser robusto en cualquier contexto. Usa el guard:
  ```blade
  @php
      // true solo si hay un error de validación para este campo (robusto si $errors no existe).
      $tieneError = $name && isset($errors) && $errors->has($name);
  @endphp
  <input {{ $attributes->class(['form-control', 'is-invalid' => $tieneError]) }}>
  @if ($tieneError)
      <div class="invalid-feedback">{{ $errors->first($name) }}</div>
  @endif
  ```

## 9. JavaScript
- Si un componente necesita JS de Tabler, debe auto-inicializarse cuando la librería esté
  presente en la página (sin configuración manual del consumidor).

## 10. Origen del markup
- Cada componente se escribe desde la **documentación de Tabler**, nunca adaptando el Blade de Flux.

## 11. Pruebas
- Cada componente lleva su test en `tests/Feature/` que renderiza el componente con `$this->blade(...)`
  y verifica las clases/atributos producidos.
- Incluye SIEMPRE un test de que las clases del consumidor se fusionan
  (`<x-tabler::nombre class="..."> -> una sola class fusionada`).
- Verifícalo en el playground (`composer run serve`) además de en los tests.
