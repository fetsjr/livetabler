@props([
    'srOnly' => false,
])

<div {{ $attributes->class(['form-hint', $srOnly ? 'sr-only' : '']) }}>
    {{ $slot }}
</div>
