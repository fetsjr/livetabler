@props([
    'label' => 'Select all',
])

<label {{ $attributes->class(['d-flex align-items-center gap-2 cursor-pointer']) }}>
    <input type="checkbox" class="form-check-input" />
    <span class="small text-body">{{ $label }}</span>
</label>
