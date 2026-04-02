@props([
    'heading' => null,
])

<div {{ $attributes->class(['flex flex-col']) }}>
    @if ($heading)
        <div class="px-3 py-1.5 text-xs font-semibold uppercase tracking-wider text-zinc-400 dark:text-zinc-500">
            {{ $heading }}
        </div>
    @endif
    {{ $slot }}
</div>
