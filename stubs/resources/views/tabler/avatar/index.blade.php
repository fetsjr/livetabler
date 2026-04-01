@props([
    'iconVariant' => 'solid',
    'initials' => null,
    'tooltip' => null,
    'circle' => null,
    'color' => null,
    'badge' => null,
    'name' => null,
    'icon' => null,
    'size' => 'md',
    'src' => null,
    'href' => null,
    'alt' => null,
    'as' => 'div',
])

@php
if ($name && ! $initials) {
    $parts = explode(' ', trim($name));

    if ($attributes->pluck('initials:single')) {
        $initials = strtoupper(mb_substr($parts[0], 0, 1));
    } else {
        $parts = collect($parts)->filter()->values()->all();

        if (count($parts) > 1) {
            $initials = strtoupper(mb_substr($parts[0], 0, 1) . mb_substr($parts[1], 0, 1));
        } else if (count($parts) === 1) {
            $initials = strtoupper(mb_substr($parts[0], 0, 1)) . strtolower(mb_substr($parts[0], 1, 1));
        }
    }
}

if ($name && $tooltip === true) {
    $tooltip = $name;
}

$hasTextContent = $icon ?? $initials ?? $slot->isNotEmpty();

if (! $hasTextContent && ! $src) {
    $icon = 'user';
    $hasTextContent = true;
}

$colors = ['red', 'orange', 'yellow', 'green', 'teal', 'cyan', 'blue', 'indigo', 'purple', 'pink'];

if ($hasTextContent && $color === 'auto') {
    $colorSeed = $attributes->pluck('color:seed') ?? $name ?? $icon ?? $initials ?? $slot;
    $hash = crc32((string) $colorSeed);
    $color = $colors[$hash % count($colors)];
}

$sizeClasses = match($size) {
    'xl' => 'size-16 text-xl',
    'lg' => 'size-12 text-lg',
    'md', default => 'size-10 text-base',
    'sm' => 'size-8 text-sm',
    'xs' => 'size-6 text-xs',
};

$roundingClasses = $circle ? 'rounded-full' : match($size) {
    'xl', 'lg' => 'rounded-xl',
    'md', 'sm', default => 'rounded-lg',
    'xs' => 'rounded-md',
};

// Tabler specific colors
$colorMap = [
    'red' => 'bg-red-100 text-red-600 dark:bg-red-500/20 dark:text-red-300',
    'orange' => 'bg-orange-100 text-orange-600 dark:bg-orange-500/20 dark:text-orange-300',
    'yellow' => 'bg-yellow-100 text-yellow-600 dark:bg-yellow-500/20 dark:text-yellow-300',
    'green' => 'bg-green-100 text-green-600 dark:bg-green-500/20 dark:text-green-300',
    'teal' => 'bg-teal-100 text-teal-600 dark:bg-teal-500/20 dark:text-teal-300',
    'cyan' => 'bg-cyan-100 text-cyan-600 dark:bg-cyan-500/20 dark:text-cyan-300',
    'blue' => 'bg-blue-100 text-blue-600 dark:bg-blue-500/20 dark:text-blue-300',
    'indigo' => 'bg-indigo-100 text-indigo-600 dark:bg-indigo-500/20 dark:text-indigo-300',
    'purple' => 'bg-purple-100 text-purple-600 dark:bg-purple-500/20 dark:text-purple-300',
    'pink' => 'bg-pink-100 text-pink-600 dark:bg-pink-500/20 dark:text-pink-300',
];

$colorClasses = $color && isset($colorMap[$color]) ? $colorMap[$color] : 'bg-gray-100 text-gray-600 dark:bg-zinc-800 dark:text-zinc-300';
if ($src) {
    $colorClasses = ''; // no specific background if has image
}

$classes = "relative inline-flex items-center justify-center font-medium shadow-sm ring-1 ring-black/5 dark:ring-white/10 overflow-hidden {$sizeClasses} {$roundingClasses} {$colorClasses}";

$badgeColor = collect($badge ?? [])->get('color', 'red');
$badgePosition = collect($badge ?? [])->get('position', 'bottom-right');

$badgeClasses = "absolute rounded-full ring-2 ring-white dark:ring-zinc-900 " . match($badgeColor) {
    'red' => 'bg-red-500',
    'green' => 'bg-green-500',
    'yellow' => 'bg-yellow-500',
    'blue' => 'bg-blue-500',
    'gray', default => 'bg-gray-400',
} . " " . match($badgePosition) {
    'top-right' => 'top-0 right-0 -translate-y-1/4 translate-x-1/4',
    'bottom-right', default => 'bottom-0 right-0 translate-y-1/4 translate-x-1/4',
} . " " . match($size) {
    'xl', 'lg' => 'size-3.5',
    'md', 'sm', default => 'size-2.5',
    'xs' => 'size-2',
};

$label = $alt ?? $name;
@endphp

@if($as === 'a')
<a href="{{ $href }}" {{ $attributes->class([$classes])->merge(['title' => $tooltip]) }}>
@elseif($as === 'button')
<button type="button" {{ $attributes->class([$classes])->merge(['title' => $tooltip]) }}>
@else
<div {{ $attributes->class([$classes])->merge(['title' => $tooltip]) }}>
@endif

    @if ($src)
        <img src="{{ $src }}" alt="{{ $label }}" class="h-full w-full object-cover">
    @elseif ($icon)
        {{-- Here we'd typically render an SVG Tabler Icon, falling back to a span for now --}}
        <span class="opacity-75">{!! $icon !!}</span>
    @elseif ($hasTextContent)
        <span class="select-none tracking-widest">{{ $initials ?? $slot }}</span>
    @endif

    @if ($badge)
        <span class="{{ $badgeClasses }}"></span>
    @endif

@if($as === 'a')
</a>
@elseif($as === 'button')
</button>
@else
</div>
@endif
