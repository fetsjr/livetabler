@props([
    'value' => null, // Underlying value for the option
])

<li 
    x-data="{
        val: '{{ $value }}',
        text: '',
        get isSelected() {
            return this.value === this.val;
        },
        init() {
            this.text = this.$el.innerText.trim();
        }
    }"
    x-show="search === '' || text.toLowerCase().includes(search.toLowerCase()) || isSelected"
    @click="selectOption(val, text)"
    class="dropdown-item"
    :class="{ 'active': isSelected }"
    role="option"
    tabindex="-1"
>
    {{ $slot }}

    <!-- Checkmark active indicator (optional for Tabler, but good for UI) -->
    <span x-show="isSelected" class="ms-auto ps-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
    </span>
</li>
