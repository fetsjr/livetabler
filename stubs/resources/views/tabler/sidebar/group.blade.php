@props([
    'heading' => null,
    'expandable' => false,
])

<div {{ $attributes->class(['flex flex-col']) }}>
    @if ($heading)
        <div class="px-3 py-2 text-xs font-semibold uppercase tracking-wider text-zinc-400 dark:text-zinc-500">
            {{ $heading }}
        </div>
    @endif
    {{ $slot }}
</div>
