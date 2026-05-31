@props([
    'icon' => 'x-mark',
])

<button type="button" {{ $attributes->class(['p-1 -my-1 -me-1 opacity-50 hover:opacity-100 transition-opacity']) }}>
    <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
</button>
