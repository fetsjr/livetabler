@props([
    // id de la tabla (se genera si no se indica).
    'id' => null,
    // Mapa de columnas clave=>etiqueta para construir el <thead>.
    'columns' => [],
    // URL de origen de datos (ajax). Si se indica, no se renderiza el <tbody>/slot.
    'url' => null,
    // Habilita la busqueda en la tabla.
    'searchable' => true,
    // Habilita la paginacion de la tabla.
    'paginated' => true,
])

@php
    // id efectivo de la tabla.
    $dtId = $id ?? 'dt-'.\Illuminate\Support\Str::random(8);
@endphp

{{-- Envoltura responsive para que la tabla pueda desplazarse en pantallas pequenas. --}}
<div class="table-responsive">
    {{-- Tabla. Fusiona las clases del consumidor con las clases base y fija el id. --}}
    <table {{ $attributes->class(['table', 'card-table', 'table-vcenter', 'text-nowrap', 'datatable'])->merge(['id' => $dtId]) }}>
        <thead>
            <tr>
                @foreach ($columns as $key => $label)
                    <th class="{{ is_numeric($key) ? '' : $key }}">{{ $label }}</th>
                @endforeach
            </tr>
        </thead>
        @if (! $url)
            {{-- Sin url los datos los aporta el consumidor via slot. --}}
            <tbody>
                {{ $slot }}
            </tbody>
        @endif
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Solo inicializa si DataTables.net esta cargado en la pagina.
        if (typeof DataTable !== 'undefined') {
            new DataTable('#{{ $dtId }}', {
                @if ($url)
                ajax: @js($url),
                @endif
                searching: {{ $searchable ? 'true' : 'false' }},
                paging: {{ $paginated ? 'true' : 'false' }},
                language: {
                    search: "Buscar:",
                    lengthMenu: "Mostrar _MENU_ registros",
                    info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    paginate: {
                        first: "Primero",
                        last: "Último",
                        next: "Siguiente",
                        previous: "Anterior"
                    },
                },
                dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                     "<'row'<'col-sm-12'tr>>" +
                     "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            });
        }
    });
</script>
