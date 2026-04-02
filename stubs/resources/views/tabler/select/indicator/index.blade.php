@props([
    'variant' => 'check',
])

@if ($variant === 'checkbox')
    <tabler:select.indicator.variants.checkbox {{ $attributes }} />
@elseif ($variant === 'radio')
    <tabler:select.indicator.variants.radio {{ $attributes }} />
@else
    <tabler:select.indicator.variants.check {{ $attributes }} />
@endif
