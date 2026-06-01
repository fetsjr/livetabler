@props([])

{{-- Cuerpo principal de la página de Tabler. Fusiona las clases del consumidor en
     un único atributo class a través del attribute bag. --}}
<main {{ $attributes->class(['page-body']) }}>
    <div class="container-xl">
        {{ $slot }}
    </div>
</main>
