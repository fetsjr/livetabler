@props([
    // Id del elemento raíz. Si no se indica se genera uno aleatorio para poder
    // referenciarlo desde el script de inicialización.
    'id' => null,

    // URL del endpoint al que Dropzone sube los archivos.
    'url' => '#',

    // Mensaje que se muestra dentro de la zona de arrastre.
    'message' => 'Arrastra tus archivos aquí o haz clic para subir',

    // Nombre del campo (paramName) que recibe cada archivo en el servidor.
    'name' => 'file',

    // Número máximo de archivos que se pueden subir.
    'maxFiles' => 1,

    // Tipos de archivo aceptados (atributo accept de Dropzone).
    'acceptedFiles' => 'image/*',
])

@php
    // Id efectivo: el indicado por el consumidor o uno aleatorio.
    $idEfectivo = $id ?? 'dz-' . \Illuminate\Support\Str::random(8);
@endphp

{{-- La raíz fusiona la clase base 'dropzone' con las clases del consumidor y añade
     id/data-url como atributos por defecto sobreescribibles. Un único atributo class. --}}
<div {{ $attributes->class(['dropzone'])->merge(['id' => $idEfectivo, 'data-url' => $url]) }}>
    <div class="dz-message">
        <div class="mb-3">
            {{-- Icono de subida de Tabler --}}
            <x-tabler::icon name="upload" class="icon-lg text-secondary" />
        </div>
        <h3>{{ $message }}</h3>
    </div>
</div>

{{-- Auto-inicialización: solo si la librería Dropzone está cargada en la página.
     Si no lo está, el componente degrada a un <div> estático sin romper. --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (typeof Dropzone !== 'undefined') {
            new Dropzone('#{{ $idEfectivo }}', {
                url: '{{ $url }}',
                paramName: '{{ $name }}',
                maxFiles: {{ $maxFiles }},
                acceptedFiles: '{{ $acceptedFiles }}',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                },
                dictDefaultMessage: '{{ $message }}',
                dictMaxFilesExceeded: 'No puedes subir más archivos.',
                dictInvalidFileType: 'Este tipo de archivo no está permitido.',
                @verbatim
                dictFileTooBig: 'El archivo es demasiado grande ({{filesize}}MiB). El máximo es {{maxFilesize}}MiB.',
                dictResponseError: 'Servidor respondió con código {{statusCode}}.',
                @endverbatim
            });
        }
    });
</script>
