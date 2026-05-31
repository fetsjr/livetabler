@php
    $id = $id ?? 'select-' . uniqid();
    $value = $value ?? null;
    $multiple = $multiple ?? false;
    $name = $name ?? '';
    $placeholder = $placeholder ?? '';
    $options = $options ?? [];
    $searchable = $searchable ?? false;

    $isSelected = function ($optionValue) use ($value, $multiple) {
        if ($multiple) {
            return in_array($optionValue, (array) ($value ?? []));
        }
        return (string) $optionValue === (string) $value;
    };
@endphp

<div class="mb-3">
    @if ($label ?? null)
        <label class="form-label">{{ $label }}</label>
    @endif

    <select 
        name="{{ $name . ($multiple ? '[]' : '') }}" 
        id="{{ $id }}"
        {{ $attributes->class(['form-select', 'is-invalid' => $errors->has($name)]) }}
        {{ $multiple ? 'multiple' : '' }}
        placeholder="{{ $placeholder }}"
    >
        @if ($placeholder && !$multiple)
            <option value="">{{ $placeholder }}</option>
        @endif

        @foreach ($options as $key => $optionLabel)
            <option value="{{ $key }}" {{ $isSelected($key) ? 'selected' : '' }}>
                {{ $optionLabel }}
            </option>
        @endforeach

        {{ $slot }}
    </select>

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    @if ($searchable || $multiple)
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const el = document.getElementById('{{ $id }}');
                if (window.TomSelect) {
                    new TomSelect(el, {
                        copyClassesToDropdown: false,
                        dropdownParent: 'body',
                        controlInput: '<input>',
                        render: {
                            item: (data, escape) => '<div>' + escape(data.text) + '</div>',
                            option: (data, escape) => '<div>' + escape(data.text) + '</div>',
                        },
                    });
                }
            });
        </script>
    @endif
</div>
