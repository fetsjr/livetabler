<!DOCTYPE html>
<html lang="es" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LiveTabler · Playground</title>
    {{-- Inyecta los estilos de Tabler publicados --}}
    @tablerStyles
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4">LiveTabler · Playground</h1>

        {{-- Sección: botones --}}
        <div class="card">
            <div class="card-header"><h3 class="card-title">Botón</h3></div>
            <div class="card-body d-flex flex-wrap gap-2">
                <x-tabler::button>Primario</x-tabler::button>
                <x-tabler::button variant="secondary">Secundario</x-tabler::button>
                <x-tabler::button variant="outline" color="primary">Outline</x-tabler::button>
                <x-tabler::button variant="ghost" color="danger">Ghost</x-tabler::button>
                <x-tabler::button variant="link">Enlace</x-tabler::button>
                <x-tabler::button size="lg">Grande</x-tabler::button>
                <x-tabler::button size="sm">Pequeño</x-tabler::button>
                <x-tabler::button :loading="true">Cargando</x-tabler::button>
                <x-tabler::button as="a" href="#">Como enlace</x-tabler::button>
            </div>
        </div>
        {{-- Sección: iconos --}}
        <div class="card mt-4">
            <div class="card-header"><h3 class="card-title">Icono</h3></div>
            <div class="card-body d-flex flex-wrap gap-3 align-items-center fs-2">
                <x-tabler::icon name="home" />
                <x-tabler::icon name="user" />
                <x-tabler::icon name="settings" :size="32" />
                <x-tabler::icon name="heart" class="text-red" />
            </div>
        </div>
    </div>
    {{-- Inyecta el JS de Tabler publicado --}}
    @tablerScripts
</body>
</html>
