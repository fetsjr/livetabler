@props([
    'logo' => null, // Optional SVG or image for branding
    'name' => config('app.name', 'Tabler UI'),
    'href' => '/',
])

<a href="{{ $href }}" {{ $attributes->class(['flex items-center gap-2 outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded-md transition-colors text-gray-900 hover:text-blue-600 dark:text-white dark:hover:text-blue-400']) }} aria-label="{{ $name }}">
    @if ($logo)
        <div class="h-8 w-8 shrink-0 flex items-center justify-center">
            {!! $logo !!}
        </div>
    @else
        <!-- Fallback Tabler-styled Brand Icon -->
        <svg class="h-8 w-8 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M4 12v-6a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-6"></path>
            <path d="M12 10l-4 4"></path>
            <path d="M12 14l-4 -4"></path>
            <path d="M16 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
        </svg>
    @endif

    <span class="text-xl font-bold tracking-tight truncate leading-none mt-1">
        {{ $name }}
    </span>
</a>
