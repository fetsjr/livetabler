@props([
    'accept' => null,
    'multiple' => false,
])

<div
    x-data="{ dragging: false }"
    x-on:dragover.prevent="dragging = true"
    x-on:dragleave.prevent="dragging = false"
    x-on:drop.prevent="dragging = false"
    :class="dragging ? 'border-primary bg-primary-lt' : 'border-secondary'"
    {{ $attributes->class(['d-flex flex-column align-items-center justify-content-center rounded-3 border-2 border-dashed p-4 text-center cursor-pointer']) }}
    style="transition: border-color 0.15s ease, background-color 0.15s ease;"
>
    <svg class="text-muted mb-3" width="40" height="40" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
    </svg>

    <div class="small text-muted">
        {{ $slot }}
    </div>

    <input
        type="file"
        class="d-none"
        @if ($accept) accept="{{ $accept }}" @endif
        @if ($multiple) multiple @endif
    />
</div>
