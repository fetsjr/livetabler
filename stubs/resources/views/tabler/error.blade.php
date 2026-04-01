@props([
    'bag' => 'default',
    'message' => null,
    'name' => null,
])

@php
    $errorBag = $errors->getBag($bag);
    $message = $message ?? ($name ? $errorBag->first($name) : null);
    
    if ($name && (is_null($message) || $message === '')) {
        $message = $errorBag->first($name . '.*');
    }

    $classes = "mt-1.5 text-sm text-red-500 dark:text-red-400 " . ($message ? 'block' : 'hidden');
@endphp

<div role="alert" {{ $attributes->class([$classes]) }} data-tabler-error>
    @if ($message)
        {{ $message }}
    @endif
</div>
