@props([
    'position' => 'bottom-right',
])

@php
$positionClass = match($position) {
    'top-left'     => 'top-0 start-0',
    'top-right'    => 'top-0 end-0',
    'bottom-left'  => 'bottom-0 start-0',
    default        => 'bottom-0 end-0',
};
@endphp

<div
    x-data="{ toasts: [] }"
    @toast.window="toasts.push({ id: Date.now(), ...$event.detail }); setTimeout(() => toasts.shift(), 5000)"
    {{ $attributes->class(['position-fixed p-3 ' . $positionClass]) }}
    style="z-index: 1090;"
>
    <template x-for="toast in toasts" :key="toast.id">
        <div
            x-show="true"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translateY-2"
            x-transition:enter-end="opacity-100 translateY-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="toast show shadow mb-2 border"
            role="alert"
            aria-live="assertive"
        >
            <div class="toast-body">
                <span x-text="toast.text || toast.message"></span>
            </div>
        </div>
    </template>
    {{ $slot }}
</div>
