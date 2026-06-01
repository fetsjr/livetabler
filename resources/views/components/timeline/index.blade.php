{{-- Raiz de la linea de tiempo (variante list-timeline de Tabler). Fusiona las
     clases del consumidor en un unico atributo class. Los items van en el slot
     como <x-tabler::timeline.item>. --}}
<ul {{ $attributes->class(['list list-timeline']) }}>
    {{ $slot }}
</ul>
