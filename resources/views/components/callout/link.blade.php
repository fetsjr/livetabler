@props([
    'external' => null,
])

<a {{ $attributes->class(['inline font-medium underline underline-offset-4 hover:decoration-current decoration-zinc-800/20 dark:decoration-white/20']) }} @if ($external) target="_blank" @endif>{{ $slot }}</a>
