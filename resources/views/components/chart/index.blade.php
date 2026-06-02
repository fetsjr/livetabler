@props([
    // id del contenedor del grafico (se genera si no se indica).
    'id' => null,
    // Tipo de grafico ApexCharts: line, area, bar, donut, pie, radialBar...
    'type' => 'line',
    // Alto del grafico en pixeles.
    'height' => 350,
    // Series de datos para ApexCharts.
    'series' => [],
    // Opciones extra de ApexCharts (se fusionan con las base).
    'options' => [],
])

@php
    // id efectivo del contenedor.
    $chartId = $id ?? 'chart-'.\Illuminate\Support\Str::random(8);
@endphp

{{-- Contenedor del grafico. Fusiona clases del consumidor y fija id/alto minimo. --}}
<div {{ $attributes->class([])->merge(['id' => $chartId, 'style' => 'min-height: '.((int) $height).'px;']) }}></div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Solo inicializa si ApexCharts esta cargado en la pagina.
        if (window.ApexCharts) {
            var options = {
                chart: {
                    type: @js($type),
                    fontFamily: 'inherit',
                    height: {{ (int) $height }},
                    parentHeightOffset: 0,
                    toolbar: { show: false },
                    animations: { enabled: true },
                },
                series: @js($series),
                grid: { strokeDashArray: 4 },
                colors: ['#066fd1', '#d63939', '#2fb344', '#f59f00', '#4299e1'],
                ...@js((object) $options)
            };
            var chart = new ApexCharts(document.getElementById(@js($chartId)), options);
            chart.render();
        }
    });
</script>
