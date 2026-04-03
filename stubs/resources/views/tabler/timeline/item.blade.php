@props([
    'icon' => null,
    'color' => null,
])

<li {{ $attributes->class(['timeline-event']) }}>
    @if ($icon)
        <div class="timeline-event-icon {{ $color ? 'bg-'.$color : '' }}">
            {!! $icon !!}
        </div>
    @else
        <div class="timeline-event-marker"></div>
    @endif
    
    <div class="timeline-event-card">
        {{ $slot }}
    </div>
</li>
