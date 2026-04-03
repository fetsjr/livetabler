@props([
    'align' => 'left',
    'trigger' => null,
])

@php
    $alignmentClasses = match ($align) {
        'right' => 'dropdown-menu-end',
        default => '',
    };
@endphp

<div class="dropdown" x-data="{ open: false }">
    <div @click="open = !open">
        {{ $trigger }}
    </div>

    <div 
        x-show="open" 
        x-cloak
        @click.outside="open = false"
        @keydown.escape.window="open = false"
        {{ $attributes->class(['dropdown-menu show', $alignmentClasses]) }}
        style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 40px);"
        data-popper-placement="bottom-end"
    >
        <div @click="open = false">
            {{ $slot }}
        </div>
    </div>
</div>
