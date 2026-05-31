@php
    $name = $name ?? 'help';
    $size = $size ?? 18;
    $stroke = $stroke ?? 2;
    $class = $class ?? '';
@endphp

<i {{ $attributes->merge(['class' => "icon ti ti-{$name} " . $class]) }} 
   style="font-size: {{ $size }}px; stroke-width: {{ $stroke }};"></i>
