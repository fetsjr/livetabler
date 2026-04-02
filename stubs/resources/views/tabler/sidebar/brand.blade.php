@props([
    'href' => '/',
    'logo' => null,
])

<a href="{{ $href }}" {{ $attributes->class(['flex items-center gap-2 px-3 py-2 font-semibold text-zinc-800 dark:text-white']) }}>
    @if ($logo)
        <img src="{{ $logo }}" alt="Logo" class="h-8 w-auto" />
    @endif
    {{ $slot }}
</a>
