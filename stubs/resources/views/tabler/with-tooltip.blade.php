@props([
    'text' => null,
])

@if ($text)
    <x-tabler::tooltip :text="$text">
        {{ $slot }}
    </x-tabler::tooltip>
@else
    {{ $slot }}
@endif
