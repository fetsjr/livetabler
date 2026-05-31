@props([
    'sticky' => false,
])

<aside {{ $attributes->class(['navbar navbar-vertical navbar-expand-lg d-flex flex-column h-100', $sticky ? 'sticky-top' : '']) }}>
    <div class="container-fluid overflow-y-auto">
        {{ $slot }}
    </div>
</aside>
