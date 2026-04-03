@php
    $fluid = $fluid ?? false;
    $id = $id ?? 'chart-' . Str::random(8);
    $type = $type ?? 'line';
    $height = $height ?? '350';
    $options = $options ?? [];
@endphp

<div id="{{ $id }}" style="min-height: {{ $height }}px;" {{ $attributes }}></div>

                    type: "{{ $type }}",
                    fontFamily: 'inherit',
                    height: {{ $height }},
                    parentHeightOffset: 0,
                    toolbar: {
                        show: false,
                    },
                    animations: {
                        enabled: true
                    },
                },
                grid: {
                    strokeDashArray: 4,
                },
                colors: ["#066fd1", "#d63939", "#2fb344", "#f59f00", "#4299e1"],
                ...{!! json_encode($options) !!}
            };

            window.{{ Str::camel($id) }} = new ApexCharts(document.getElementById('{{ $id }}'), options);
            window.{{ Str::camel($id) }}.render();
        }
    });
</script>
