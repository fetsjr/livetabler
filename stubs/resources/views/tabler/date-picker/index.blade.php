@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
])

<!-- We use a visually stunning Tabler skin over the native accessible Date API -->
<div class="relative w-full">
    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
        <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
        </svg>
    </div>
    <input 
        type="date"
        @if ($name) name="{{ $name }}" {{ $attributes->wire('model') }} @endif
        class="block w-full rounded-md border border-gray-300 py-2 pl-10 pr-3 text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white dark:focus:border-blue-500 dark:focus:ring-blue-500"
        {{ $attributes->except('wire:model') }}
    />
</div>
