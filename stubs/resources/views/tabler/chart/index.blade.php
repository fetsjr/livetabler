<div id="{{ $id }}" style="min-height: {{ $height }}px;" {{ $attributes }}></div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (typeof ApexCharts !== 'undefined') {
            const options = {
                chart: {
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
