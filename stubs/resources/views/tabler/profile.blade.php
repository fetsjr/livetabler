@props([
    'name' => '',
    'description' => null,
    'avatar' => null, // Optional source URL for avatar
    'size' => 'md',
])

<div {{ $attributes->class(['flex items-center gap-3']) }}>
    <!-- Delegate avatar render to our avatar component -->
    @if ($avatar)
        <x-tabler::avatar :src="$avatar" :name="$name" :size="$size" circle />
    @else
        <x-tabler::avatar :name="$name" :size="$size" circle />
    @endif

    <div class="flex flex-col">
        <span class="text-sm font-semibold leading-tight text-gray-900 dark:text-white">{{ $name }}</span>
        @if ($description)
            <span class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">{{ $description }}</span>
        @endif
    </div>
</div>
