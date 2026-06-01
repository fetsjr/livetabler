@props([
    // Nombre del usuario (línea principal).
    'name' => null,
    // URL del avatar. Si es null y hay nombre, se muestra la inicial sobre fondo.
    'avatar' => null,
    // Línea secundaria (email, rol...).
    'email' => null,
])

{{-- Bloque de usuario al estilo Tabler: avatar + texto. Usa utilidades reales de
     Bootstrap 5/Tabler (d-flex, align-items-center, avatar avatar-sm). Fusiona las
     clases del consumidor en el único class del raíz. --}}
<div {{ $attributes->class(['d-flex align-items-center px-3 py-2']) }}>
    @if ($avatar)
        {{-- Avatar como imagen de fondo (patrón canónico de Tabler) --}}
        <span class="avatar avatar-sm" style="background-image: url({{ $avatar }})"></span>
    @elseif ($name)
        {{-- Sin imagen: inicial del nombre sobre fondo de color claro --}}
        <span class="avatar avatar-sm bg-blue-lt">{{ strtoupper(substr($name, 0, 1)) }}</span>
    @endif

    <div class="ps-2">
        @if ($name)
            <div>{{ $name }}</div>
        @endif
        @if ($email)
            <div class="mt-1 small text-secondary">{{ $email }}</div>
        @endif
        {{ $slot }}
    </div>
</div>
