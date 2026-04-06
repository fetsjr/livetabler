@props([
    'checked' => false,
    'name' => null,
    'value' => null,
])

<button
    type="button"
    x-data="{ checked: @js($checked) }"
    @click="checked = !checked"
    {{ $attributes->class(['dropdown-item d-flex align-items-center gap-2']) }}
>
    <span
        class="d-flex align-items-center justify-content-center rounded border"
        style="width: 1rem; height: 1rem;"
        :class="checked ? 'bg-primary border-primary text-white' : 'border-secondary'"
    >
        <svg x-show="checked" width="10" height="10" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
        </svg>
    </span>
    <span>{{ $slot }}</span>
</button>
