@props([
    'icon' => null,
    'kbd' => null,
    'value' => null, // Unique identifier if selected
])

<li 
    role="option" 
    tabindex="-1"
    x-show="search === '' || $el.innerText.toLowerCase().includes(search.toLowerCase())"
    {{ $attributes->class(['group flex cursor-pointer select-none items-center gap-3 rounded-xl px-4 py-3 hover:bg-gray-100 dark:hover:bg-zinc-800 focus:bg-gray-100 dark:focus:bg-zinc-800 focus:outline-none']) }}
>
    @if($icon)
        <span class="flex h-6 w-6 shrink-0 items-center justify-center text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500">
            {!! $icon !!}
        </span>
    @else
        <!-- Offset for consistency if required, normally handled by slot layout -->
    @endif

    <div class="flex-auto truncate text-sm">
        {{ $slot }}
    </div>

    @if($kbd)
        <kbd class="hidden sm:inline-block font-sans text-xs font-semibold text-gray-400 dark:text-gray-500 bg-gray-100 dark:bg-zinc-800 px-2 py-0.5 rounded border border-gray-200 dark:border-zinc-700">
            {{ $kbd }}
        </kbd>
    @endif
</li>
