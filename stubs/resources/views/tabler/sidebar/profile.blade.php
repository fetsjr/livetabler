@props([
    'name' => null,
    'avatar' => null,
    'email' => null,
])

<div {{ $attributes->class(['flex items-center gap-3 px-3 py-2']) }}>
    @if ($avatar)
        <img src="{{ $avatar }}" alt="{{ $name }}" class="h-8 w-8 rounded-full object-cover" />
    @endif
    <div class="flex-1 min-w-0">
        @if ($name)
            <div class="text-sm font-medium text-zinc-800 dark:text-white truncate">{{ $name }}</div>
        @endif
        @if ($email)
            <div class="text-xs text-zinc-500 dark:text-zinc-400 truncate">{{ $email }}</div>
        @endif
        {{ $slot }}
    </div>
</div>
