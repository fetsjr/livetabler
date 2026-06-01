{{-- Espaciador flexible: ocupa el espacio sobrante en un contenedor flex para empujar
     a los elementos hermanos. Fusiona las clases del consumidor. --}}
@props([])

<div {{ $attributes->class(['flex-1']) }} aria-hidden="true" data-tabler-spacer></div>
