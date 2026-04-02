@props([
    'placeholder' => 'No date selected',
])

<div {{ $attributes->class(['text-sm text-zinc-700 dark:text-zinc-300']) }}>
    {{ $slot->isEmpty() ? $placeholder : $slot }}
</div>
