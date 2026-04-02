@props([
    'name' => null,
])

<div x-data="{ value: '' }" class="relative" {{ $attributes }}>
    <div class="[&>input]:pr-8">
        {{ $slot }}
    </div>
    <button
        type="button"
        x-show="value || ($el.previousElementSibling?.querySelector('input')?.value)"
        @click="let input = $el.parentElement.querySelector('input'); input.value = ''; input.dispatchEvent(new Event('input')); value = '';"
        class="absolute right-2 top-1/2 -translate-y-1/2 text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-300"
        style="display: none;"
    >
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
    </button>
</div>
