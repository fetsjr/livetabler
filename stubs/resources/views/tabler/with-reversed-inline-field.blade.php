@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'description' => null,
    'label' => null,
])

@if (isset($label) || isset($description))
    <x-tabler::field variant="inline" {{ $attributes->only('class') }}>
        <div class="flex flex-col gap-0.5">
            @if (isset($label))
                <x-tabler::label class="!mb-0">{{ $label }}</x-tabler::label>
            @endif

            @if (isset($description))
                <x-tabler::description class="!mb-0">{{ $description }}</x-tabler::description>
            @endif
        </div>
        
        {{ $slot }}
        
        <x-tabler::error :name="$name" />
    </x-tabler::field>
@else
    {{ $slot }}
@endif
