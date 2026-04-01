@props([
    'name' => null, // Typically for icon sets you dynamically include or render paths based on the name
    'variant' => 'outline', // outline, solid, mini, micro
    'class' => 'w-5 h-5', // Default classes often passed
])

@php
    // In a full UI kit, you'd render specific SVG paths per icon.
    // For Tabler, standard `<svg>` tags using Tabler icons paths or Heroicons logic
    // By default, as a stub, we will render a generic shape or rely on child slots 
    // if SVG contents are passed inside.
@endphp

<svg {{ $attributes->merge(['class' => "inline-block text-current {$class}"]) }} viewBox="0 0 24 24" fill="@if($variant === 'outline') none @else currentColor @endif" stroke="@if($variant === 'outline') currentColor @else none @endif" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    @if(slot->isEmpty())
        <!-- Default fallback generic circle if no icon paths provided in slot -->
        <circle cx="12" cy="12" r="10"></circle>
    @else
        {{ $slot }}
    @endif
</svg>
