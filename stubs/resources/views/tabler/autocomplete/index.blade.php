@php
    $id = $id ?? 'autocomplete-' . uniqid();
    $name = $name ?? '';
    $value = $value ?? null;
    $label = $label ?? null;
    $placeholder = $placeholder ?? 'Buscar...';
    $url = $url ?? null;
    $minChars = $minChars ?? 3;
    $options = $options ?? [];
@endphp

<div class="mb-3">
    @if ($label ?? null)
        <label class="form-label">{{ $label }}</label>
    @endif

    <select 
        name="{{ $name }}" 
        id="{{ $id }}"
        {{ $attributes->class(['form-select', 'is-invalid' => $errors->has($name)]) }}
        placeholder="{{ $placeholder }}"
    >
        @if ($value)
            <option value="{{ $value }}" selected>{{ $value }}</option>
        @endif
        
        @foreach ($options as $key => $optionLabel)
            <option value="{{ $key }}">{{ $optionLabel }}</option>
        @endforeach
    </select>

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const el = document.getElementById('{{ $id }}');
            if (window.TomSelect) {
                new TomSelect(el, {
                    valueField: 'id',
                    labelField: 'text',
                    searchField: 'text',
                    @if ($url)
                    load: function(query, callback) {
                        if (query.length < {{ $minChars }}) return callback();
                        
                        var url = '{{ $url }}?q=' + encodeURIComponent(query);
                        fetch(url)
                            .then(response => response.json())
                            .then(json => {
                                callback(json.items || json);
                            }).catch(() => {
                                callback();
                            });
                    },
                    @endif
                    render: {
                        option: function(item, escape) {
                            return '<div>' + escape(item.text) + '</div>';
                        },
                        item: function(item, escape) {
                            return '<div>' + escape(item.text) + '</div>';
                        }
                    }
                });
            }
        });
    </script>
</div>
