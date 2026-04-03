@props([
    'vertical' => false,
    'text' => null,
])

@if ($text)
    <div class="hr-text">
        {{ $text }}
    </div>
@else
    <hr class="{{ $vertical ? 'hr-vertical' : '' }} my-3">
@endif
