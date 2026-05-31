@props([
    'placeholder' => 'Type a command or search...',
    'icon' => true,
    'clearable' => true,
])

<div class="d-flex align-items-center border-bottom px-3">
    @if($icon)
        <svg class="icon text-muted flex-shrink-0" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
    @endif

    <input
        type="text"
        x-model="search"
        class="form-control border-0 shadow-none py-3 ps-2 bg-transparent"
        placeholder="{{ $placeholder }}"
        {{ $attributes }}
    />

    @if($clearable)
        <button
            type="button"
            x-show="search.length > 0"
            @click="search = ''; focusInput();"
            class="btn btn-sm btn-icon btn-ghost-secondary"
            title="Clear"
            style="display: none;"
        >
            <span class="visually-hidden">Clear search</span>
            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    @endif
</div>
