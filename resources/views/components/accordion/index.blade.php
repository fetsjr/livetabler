@php
    $id = $id ?? 'acc-group-' . uniqid();
    $classes = 'accordion';
    if ($flush ?? false) {
        $classes .= ' accordion-flush';
    }
@endphp

<div {{ $attributes->merge(['class' => $classes, 'id' => $id]) }}>
    {{ $slot }}
</div>
