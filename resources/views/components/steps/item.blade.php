@props([
    // Marca este paso como el actual (clase 'active' de Tabler).
    'active' => false,

    // Texto del paso. Si no se indica, se usa el contenido del slot.
    'title' => null,

    // URL del paso. Por defecto '#'.
    'href' => null,
])

{{-- Paso individual. Es un enlace <a> que fusiona las clases del consumidor en
     un unico atributo class. El contenido es el titulo o, en su defecto, el
     slot. --}}
<a href="{{ $href ?? '#' }}" {{ $attributes->class(['step-item', 'active' => $active]) }}>
    {{ $title ?? $slot }}
</a>
