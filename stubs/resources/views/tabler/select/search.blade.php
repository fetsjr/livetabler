@props([
    'placeholder' => null,
    'clearable' => true,
    'closable' => null,
    'icon' => null,
])

<div class="input-icon w-100 border-bottom">
    <span class="input-icon-addon">
        @if ($icon)
            <x-tabler::icon :name="$icon" class="icon" />
        @else
            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
        @endif
    </span>
    <input
        type="text"
        {{ $attributes->class(['form-control border-0 shadow-none']) }}
        placeholder="{{ $placeholder ?? __('Search...') }}"
        data-flux-select-search-input
        autofocus
    >
    @if ($clearable)
        <span class="input-icon-addon input-icon-addon-end cursor-pointer" data-flux-select-search-clear>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
        </span>
    @endif
</div>
