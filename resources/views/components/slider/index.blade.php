@props([
    // Campo de Livewire al que se enlaza el valor. Por defecto se toma del primer
    // atributo wire:model presente (wire:model="volumen" -> name="volumen"), de modo
    // que el consumidor solo escribe wire:model y el slider se sincroniza solo.
    'name' => $attributes->whereStartsWith('wire:model')->first(),

    // Valor minimo del rango.
    'min' => 0,

    // Valor maximo del rango.
    'max' => 100,

    // Incremento entre pasos del deslizador.
    'step' => 1,

    // Valor inicial cuando NO hay wire:model (estado local de Alpine).
    'value' => 50,
])

@php
    // Expresion JS para inicializar el estado Alpine:
    // - con wire:model (cualquier modificador: .live, .blur...) -> se entrelaza con Livewire
    //   (entangle). Se usa $name (resuelto via whereStartsWith) para detectar la presencia del
    //   binding, igual que el atributo name del input; asi entangle y el wire:model emitido se
    //   deciden con el MISMO criterio y el estado Alpine no se desincroniza de Livewire.
    // - sin wire:model -> arranca desde la prop value, escapada de forma segura con Js::from.
    $valorInicial = $name
        ? "\$wire.entangle('{$name}')"
        : \Illuminate\Support\Js::from($value)->toHtml();
@endphp

{{-- Envoltura: solo aporta el layout (ancho completo y posicionamiento para los ticks).
     NO absorbe las clases del consumidor; esas se fusionan en el propio <input> (ver abajo),
     que es el control real del componente. --}}
<div
    class="w-100 position-relative"
    x-data="{ value: {{ $valorInicial }} }"
>
    {{-- Capa de marcas/ticks opcional. pe-none (pointer-events) deja pasar el raton al input. --}}
    <div class="position-absolute w-100 top-50 translate-middle-y d-flex justify-content-between px-1 pe-none" style="z-index: 1;">
        {{ $slot }}
    </div>

    {{-- El <input type="range"> nativo de Bootstrap. Fusiona las clases del consumidor
         (form-range va siempre). whereDoesntStartWith('wire:model') evita duplicar el
         wire:model, que ya se reemite explicitamente cuando hay name. --}}
    <input
        type="range"
        min="{{ $min }}"
        max="{{ $max }}"
        step="{{ $step }}"
        x-model="value"
        @if ($name) name="{{ $name }}" {{ $attributes->wire('model') }} @endif
        {{ $attributes->whereDoesntStartWith('wire:model')->class(['form-range']) }}
        style="position: relative; z-index: 2;"
    />
</div>
