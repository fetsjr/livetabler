@props([
    // Identificador del item; ancla el boton con su panel colapsable.
    // Si no se indica, se genera uno automatico unico.
    'itemId' => null,

    // Texto del encabezado del item.
    'title' => '',

    // Si es true, el panel arranca abierto (clase 'show') y el boton sin
    // 'collapsed'.
    'active' => false,

    // Nombre de icono Tabler opcional que se muestra antes del titulo.
    'icon' => null,

    // Id del acordeon padre. Si se indica, habilita el comportamiento
    // exclusivo (al abrir uno se cierran los demas) via data-bs-parent.
    'parentId' => null,
])

@php
    // Id efectivo del item: el indicado o uno autogenerado unico.
    $idEfectivo = $itemId ?? 'acc-item-' . uniqid();
@endphp

<div class="accordion-item">
    <h2 class="accordion-header">
        <button {{ $attributes->class(['accordion-button', 'collapsed' => ! $active]) }}
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#{{ $idEfectivo }}"
                aria-expanded="{{ $active ? 'true' : 'false' }}">
            @if ($icon)
                <x-tabler::icon :name="$icon" class="me-2" />
            @endif
            {{ $title }}
        </button>
    </h2>
    <div id="{{ $idEfectivo }}"
         @class(['accordion-collapse', 'collapse', 'show' => $active])
         @if ($parentId) data-bs-parent="#{{ $parentId }}" @endif>
        <div class="accordion-body">
            {{ $slot }}
        </div>
    </div>
</div>
