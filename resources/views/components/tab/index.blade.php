@props([
    // Identificador de esta pestaña. Debe coincidir con el "name" del panel asociado
    // y, opcionalmente, con el "default" del contenedor de pestañas.
    'name' => null,
])

{{-- Elemento de pestaña. La raíz es el <li class="nav-item">, que fusiona las clases del consumidor.
     El <button> interno usa @class (permitido en elementos internos) y Alpine para el estado activo. --}}
<li {{ $attributes->class(['nav-item']) }}>
    <button
        type="button"
        role="tab"
        @class(['nav-link'])
        :class="{ 'active': activeTab === @js($name) }"
        :aria-selected="activeTab === @js($name)"
        @click="activeTab = @js($name)"
    >
        {{ $slot }}
    </button>
</li>
