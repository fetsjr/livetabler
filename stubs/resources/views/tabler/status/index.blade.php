<span {{ $attributes->class([
    'status-dot', 
    'status-' . ($color ?? 'primary'), 
    'status-dot-animated' => $animated ?? false
]) }}></span>
