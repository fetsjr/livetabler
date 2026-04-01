@props([
    'description' => null,
])

<legend {{ $attributes->class(['block text-base font-semibold text-gray-900 border-b border-gray-200 w-full pb-2 mb-4 dark:text-white dark:border-zinc-800']) }}>
    <div>{{ $slot }}</div>
    @if ($description)
        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">{{ $description }}</p>
    @endif
</legend>
