@props([
    'filterable' => null,
    'indicator' => null,
    'loading' => null,
    'label' => null,
    'value' => null,
])

<div
    {{ $attributes->class(['dropdown-item d-flex align-items-center gap-2 cursor-pointer w-100 text-start small fw-medium overflow-hidden']) }}
    role="option"
    @if ($value !== null) data-value="{{ $value }}" @endif
    data-tabler-listbox-option
>
    <div class="flex-shrink-0" style="width: 1.5rem;">
        @if ($indicator)
            {{ $indicator }}
        @else
            <tabler:select.indicator />
        @endif
    </div>

    {{ $slot->isNotEmpty() ? $slot : $label }}
</div>
