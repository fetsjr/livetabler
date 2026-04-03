@props([
    'name' => null,
    'trigger' => null,
    'closable' => true,
    'blur' => true,
    'size' => null, // sm, lg, xl, full-width
])

<div 
    x-data="{ 
        open: false,
        name: '{{ $name }}'
    }"
    @modal-show.window="if ($event.detail === name) open = true;"
    @modal-close.window="if ($event.detail === name) open = false;"
    @keydown.escape.window="if (open) open = false;"
    class="modal {{ $blur ? 'modal-blur' : '' }} fade"
    :class="{ 'show': open }"
    :style="open ? 'display: block; padding-right: 17px;' : 'display: none;'"
    tabindex="-1" 
    role="dialog" 
    aria-hidden="true"
    x-cloak
>
    <!-- Modal Backdrop handled by Alpine -->
    <div x-show="open" class="modal-backdrop fade show" @click="open = false"></div>

    <div class="modal-dialog {{ $size ? 'modal-'.$size : '' }} modal-dialog-centered" role="document" @click.stop>
        <div class="modal-content">
            @if($closable)
                <button type="button" class="btn-close" @click="open = false" aria-label="Close"></button>
            @endif
            
            <div class="modal-body">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>

@if ($trigger)
    <div @click="open = true" class="inline-block" x-data="{ open: false }">
        {{ $trigger }}
    </div>
@endif
