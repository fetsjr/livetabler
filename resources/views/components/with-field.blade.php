@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'descriptionTrailing' => null,
    'description' => null,
    'label' => null,
    'badge' => null,
])

@if (isset($label) || isset($description))
    <x-tabler::field {{ $attributes->only('class') }}>
        @if (isset($label))
            <x-tabler::label :badge="$badge">{{ $label }}</x-tabler::label>
        @endif

        @if (isset($description))
            <x-tabler::description>{{ $description }}</x-tabler::description>
        @endif

        {{ $slot }}

        <!-- Delegate error rendering to tabler error component -->
        <x-tabler::error :name="$name" />

        @if (isset($descriptionTrailing))
            <x-tabler::description>{{ $descriptionTrailing }}</x-tabler::description>
        @endif
    </x-tabler::field>
@else
    {{ $slot }}
@endif
