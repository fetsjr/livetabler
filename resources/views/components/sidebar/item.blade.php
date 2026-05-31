@props([
    'icon' => null,
    'href' => null,
    'current' => false,
    'badge' => null,
])

<div class="nav-item">
    <a @if ($href) href="{{ $href }}" @endif {{ $attributes->class(['nav-link', 'active' => $current]) }}>
        @if ($icon)
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                {!! $icon !!}
            </span>
        @endif
        <span class="nav-link-title">
            {{ $slot }}
        </span>
        @if ($badge)
            <span class="badge bg-blue-lt ms-auto">
                {{ $badge }}
            </span>
        @endif
    </a>
</div>
