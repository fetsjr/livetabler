@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
])

<div class="relative w-full">
    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
        <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </div>
    <input 
        type="time"
        @if ($name) name="{{ $name }}" {{ $attributes->wire('model') }} @endif
        class="block w-full rounded-md border border-gray-300 py-2 pl-10 pr-3 text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white dark:focus:border-blue-500 dark:focus:ring-blue-500 [&::-webkit-calendar-picker-indicator]:dark:filter [&::-webkit-calendar-picker-indicator]:dark:invert"
        {{ $attributes->except('wire:model') }}
    />
</div>
