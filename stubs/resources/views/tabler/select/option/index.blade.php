@props([
    'value' => null,
    'label' => null,
    'selected' => false,
])

<option value="{{ $value }}" {{ $selected ? 'selected' : '' }} {{ $attributes }}>
    {{ $label ?? $slot }}
</option>
