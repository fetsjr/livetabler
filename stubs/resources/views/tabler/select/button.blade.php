@props([
    'placeholder' => null,
    'clearable' => null,
    'invalid' => null,
    'suffix' => null,
    'size' => null,
    'max' => null,
])

@php
    $invalid = $invalid || ($max && $errors->has($max)); // Simple fallback
    $classes = 'form-select text-start d-flex align-items-center position-relative shadow-none border-1';
    if ($size) { $classes .= " form-select-{$size}"; }
    if ($invalid) { $classes .= ' is-invalid'; }
@endphp

<button
    type="button"
    {{ $attributes->class([$classes])->merge(['style' => 'background-image: none;']) }}
    data-flux-select-button
>
    <div class="flex-grow-1 overflow-hidden">
        @if ($slot->isNotEmpty())
            {{ $slot }}
        @else
            <x-tabler::select.selected :$placeholder :$suffix :$max />
        @endif
    </div>

    @if ($clearable)
        <span class="position-absolute end-0 me-5 cursor-pointer text-muted" data-flux-select-clear style="z-index: 5;">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-xs" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
        </span>
    @endif

    <span class="position-absolute end-0 me-2 pointer-events-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-xs text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 9l6 6l6 -6" /></svg>
    </span>
</button>
