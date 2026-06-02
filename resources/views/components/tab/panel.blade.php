@props([
    // Identificador del panel. Debe coincidir con el "name" de la pestaña que lo activa.
    'name' => null,
])

{{-- Panel de contenido. Raíz <div class="tab-pane fade"> que fusiona las clases del consumidor.
     'fade' es parte del marcado oficial de Tabler/Bootstrap y es lo que hace que 'show'
     tenga efecto de opacidad; el panel activo anade 'active show' via Alpine.
     El id estable (tab-panel-{name}) enlaza con el aria-controls del boton de la pestaña. --}}
<div
    x-show="activeTab === @js($name)"
    x-cloak
    :class="{ 'active show': activeTab === @js($name) }"
    :aria-hidden="activeTab !== @js($name)"
    role="tabpanel"
    id="tab-panel-{{ $name }}"
    {{ $attributes->class(['tab-pane', 'fade']) }}
>
    {{ $slot }}
</div>
