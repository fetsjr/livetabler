@php
    $id = $id ?? 'dz-' . \Illuminate\Support\Str::random(8);
    $url = $url ?? '#';
    $message = $message ?? 'Arrastra tus archivos aquí o haz clic para subir';
    $name = $name ?? 'file';
    $maxFiles = $maxFiles ?? 1;
    $acceptedFiles = $acceptedFiles ?? 'image/*';
@endphp

<div id="{{ $id }}" class="dropzone" data-url="{{ $url }}" {{ $attributes }}>
    <div class="dz-message">
        <div class="mb-3">
            <!-- Download SVG icon from http://tabler.io/icons/icon/upload -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-lg text-secondary" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 9l5 -5l5 5" /><path d="M12 4l0 12" /></svg>
        </div>
        <h3>{{ $message }}</h3>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (typeof Dropzone !== 'undefined') {
            const dz = new Dropzone('#{{ $id }}', {
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
                dictFileTooBig: 'El archivo es demasiado grande ({{ '{{' }}maxFilesize{{ '}}' }}MiB). El máximo es {{ '{{' }}maxFilesize{{ '}}' }}MiB.',
                dictResponseError: 'Servidor respondió con código {{ '{{' }}statusCode{{ '}}' }}.',
            });
        }
    });
</script>
