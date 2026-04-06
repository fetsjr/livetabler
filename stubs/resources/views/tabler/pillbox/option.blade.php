@props([
    'value' => null,
])

<div
    x-data="{
        val: '{{ $value }}',
        text: '',
        get isSelected() {
            return this.selectedList.findIndex(i => i.val === this.val) > -1;
        },
        init() {
            this.text = this.$el.innerText.trim();
        }
    }"
    x-show="search === '' || text.toLowerCase().includes(search.toLowerCase())"
    @click="toggleSelection(val, text)"
    class="dropdown-item cursor-pointer d-flex align-items-center gap-2 pe-5 position-relative"
    :class="{ 'active bg-primary-lt text-primary': isSelected }"
    role="option"
    tabindex="0"
>
    <div class="d-flex align-items-center gap-2">
        {{ $slot }}
    </div>

    {{-- Active Indicator Checkmark --}}
    <span
        x-show="isSelected"
        class="position-absolute end-0 top-50 translate-middle-y pe-3 text-primary"
    >
        <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143z" clip-rule="evenodd" />
        </svg>
    </span>
</div>
