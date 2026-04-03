@props([
    'name' => '',
    'description' => null,
    'avatar' => null, // Optional source URL for avatar
    'size' => 'md',
])

<div {{ $attributes->class(['d-flex align-items-center gap-2']) }}>
    <!-- Delegate avatar render to our avatar component -->
    @if ($avatar)
        <x-tabler::avatar :src="$avatar" :name="$name" :size="$size" circle />
    @else
        <x-tabler::avatar :name="$name" :size="$size" circle />
    @endif

    <div class="d-flex flex-column lh-1">
        <span class="fw-bold small">{{ $name }}</span>
        @if ($description)
            <span class="text-secondary smaller mt-1">{{ $description }}</span>
        @endif
    </div>
</div>
