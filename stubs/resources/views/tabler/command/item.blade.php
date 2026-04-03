@props([
    'icon' => null,
    'kbd' => null,
    'value' => null, // Unique identifier if selected
])

<li 
    role="option" 
    tabindex="-1"
    x-show="search === '' || $el.innerText.toLowerCase().includes(search.toLowerCase())"
    {{ $attributes->class(['list-group-item list-group-item-action border-0 d-flex align-items-center gap-3 p-3']) }}
>
    @if($icon)
        <span class="icon text-secondary">
            {!! $icon !!}
        </span>
    @endif

    <div class="flex-fill text-truncate">
        {{ $slot }}
    </div>

    @if($kbd)
        <kbd class="kbd ms-auto">
            {{ $kbd }}
        </kbd>
    @endif
</li>
