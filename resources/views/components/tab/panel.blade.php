@props([
    // Identificador del panel. Debe coincidir con el "name" de la pestaña que lo activa.
    'name' => null,
])

{{-- Panel de contenido. Raíz <div class="tab-pane"> que fusiona las clases del consumidor.
     Alpine controla la visibilidad (x-show) y las clases active/show de Tabler. --}}
<div
    x-show="activeTab === @js($name)"
    x-cloak
    :class="{ 'active show': activeTab === @js($name) }"
    :aria-hidden="activeTab !== @js($name)"
    role="tabpanel"
    {{ $attributes->class(['tab-pane']) }}
>
    {{ $slot }}
</div>
