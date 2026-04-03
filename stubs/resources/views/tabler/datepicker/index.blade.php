@php
    $id = $id ?? 'datepicker-' . uniqid();
    $config = array_merge([
        'element' => "document.getElementById('{$id}')",
        'buttonText' => [
            'previousMonth' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="15 6 9 12 15 18" /></svg>',
            'nextMonth' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>',
        ]
    ], $options ?? []);
@endphp

@php
    $id = $id ?? 'dp-' . uniqid();
    $name = $name ?? '';
    $value = $value ?? null;
    $label = $label ?? null;
    $placeholder = $placeholder ?? 'Seleccionar fecha...';
    $format = $format ?? 'YYYY-MM-DD';
@endphp

<div class="mb-3">
    @if ($label ?? null)
        <label class="form-label">{{ $label }}</label>
    @endif

    <div @class(['input-icon' => $icon])>
        @if ($icon)
            <span class="input-icon-addon">
                <x-tabler::icon name="calendar" />
            </span>
        @endif

        <input 
            type="text" 
            name="{{ $name }}" 
            id="{{ $id }}"
            value="{{ $value }}"
            placeholder="{{ $placeholder }}"
            @class(['form-control', 'is-invalid' => $errors->has($name)])
            {{ $attributes }}
        />
    </div>

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const el = document.getElementById('{{ $id }}');
            if (window.Litepicker) {
                new Litepicker({
                    element: el,
                    ...{!! json_encode(array_diff_key($config, ['element' => ''])) !!},
                    buttonText: {!! json_encode($config['buttonText']) !!}
                });
            }
        });
    </script>
</div>
