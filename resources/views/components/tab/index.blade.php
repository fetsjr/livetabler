@props([
    // Identificador de esta pestaña. Debe coincidir con el "name" del panel asociado
    // y, opcionalmente, con el "default" del contenedor de pestañas.
    'name' => null,
])

{{-- Elemento de pestaña. La raíz es el <li class="nav-item" role="presentation">, que fusiona
     las clases del consumidor. role="presentation" replica el marcado oficial de Tabler para que
     el <li> no interfiera con la semantica role=tab del boton dentro del role=tablist del <ul>.
     El <button> interno usa @class (permitido en elementos internos) y Alpine para el estado activo;
     aria-controls lo enlaza con el panel role=tabpanel cuyo id deriva del mismo 'name'. --}}
<li {{ $attributes->class(['nav-item'])->merge(['role' => 'presentation']) }}>
    <button
        type="button"
        role="tab"
        aria-controls="tab-panel-{{ $name }}"
        @class(['nav-link'])
        :class="{ 'active': activeTab === @js($name) }"
        :aria-selected="activeTab === @js($name)"
        @click="activeTab = @js($name)"
    >
        {{ $slot }}
    </button>
</li>
