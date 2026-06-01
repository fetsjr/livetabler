@props([])

{{-- Pie de página de Tabler. Fusiona las clases del consumidor en un único
     atributo class a través del attribute bag. --}}
<footer {{ $attributes->class(['footer footer-transparent d-print-none']) }}>
    <div class="container-xl">
        <div class="row text-center align-items-center flex-row-reverse">
            {{ $slot }}
        </div>
    </div>
</footer>
