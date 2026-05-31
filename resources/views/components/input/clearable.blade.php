<div x-data="{ value: '' }" class="position-relative" {{ $attributes }}>
    <div class="[&>input]:pe-5">
        {{ $slot }}
    </div>
    <button
        type="button"
        x-show="value || ($el.previousElementSibling?.querySelector('input')?.value)"
        @click="let input = $el.parentElement.querySelector('input'); input.value = ''; input.dispatchEvent(new Event('input')); value = '';"
        class="btn btn-sm btn-icon position-absolute top-50 end-0 translate-middle-y me-1 text-muted border-0 p-1"
        style="display: none;"
    >
        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
