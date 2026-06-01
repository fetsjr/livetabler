{{-- Contenedor de los paneles de pestaña: <div class="tab-content"> de Tabler.
     Agrupa los <x-tabler::tab.panel>. No declara estado Alpine; lo hereda del scope del contenedor. --}}
<div {{ $attributes->class(['tab-content']) }}>
    {{ $slot }}
</div>
