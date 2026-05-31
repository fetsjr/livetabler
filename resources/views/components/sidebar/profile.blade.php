@props([
    'name' => null,
    'avatar' => null,
    'email' => null,
])

<div {{ $attributes->class(['d-flex align-items-center gap-3 px-3 py-2']) }}>
    @if ($avatar)
        <span class="avatar avatar-sm rounded-circle" style="background-image: url({{ $avatar }})"></span>
    @elseif($name)
        <span class="avatar avatar-sm rounded-circle bg-blue-lt fw-bold">{{ substr($name, 0, 1) }}</span>
    @endif
    <div class="d-flex flex-column lh-1 overflow-hidden">
        @if ($name)
            <div class="fw-bold small text-truncate">{{ $name }}</div>
        @endif
        @if ($email)
            <div class="text-secondary smaller text-truncate mt-1">{{ $email }}</div>
        @endif
        {{ $slot }}
    </div>
</div>
