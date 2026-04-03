<div class="table-responsive">
    <table id="{{ $id }}" class="table card-table table-vcenter text-nowrap datatable" {{ $attributes }}>
        <thead>
            <tr>
                @foreach($columns as $key => $label)
                    <th class="{{ is_numeric($key) ? '' : $key }}">{{ $label }}</th>
                @endforeach
            </tr>
        </thead>
        @if(!$url)
            <tbody>
                {{ $slot }}
            </tbody>
        @endif
    </table>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (typeof DataTable !== 'undefined') {
            new DataTable('#{{ $id }}', {
                @if($url)
                ajax: '{{ $url }}',
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
