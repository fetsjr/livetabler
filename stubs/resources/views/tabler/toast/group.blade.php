@props([
    'position' => 'bottom-right',
])

<div
    x-data="{ toasts: [] }"
    @toast.window="toasts.push({ id: Date.now(), ...$event.detail }); setTimeout(() => toasts.shift(), 5000)"
    {{ $attributes->class(['fixed z-50', match($position) {
        'top-left' => 'top-4 left-4',
        'top-right' => 'top-4 right-4',
        'bottom-left' => 'bottom-4 left-4',
        default => 'bottom-4 right-4',
    }]) }}
>
    <template x-for="toast in toasts" :key="toast.id">
        <div
            x-show="true"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="mb-2 rounded-lg bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 shadow-lg px-4 py-3 text-sm text-zinc-800 dark:text-zinc-200"
        >
            <span x-text="toast.text || toast.message"></span>
        </div>
    </template>
    {{ $slot }}
</div>
