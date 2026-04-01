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
    :class="{ 'bg-blue-50 text-blue-900 font-semibold dark:bg-blue-500/20 dark:text-blue-300': isSelected, 'text-gray-900 dark:text-gray-200': !isSelected }"
    class="relative cursor-default select-none py-2 pl-3 pr-9 hover:bg-gray-100 dark:hover:bg-zinc-700 transition-colors"
    role="option"
    tabindex="-1"
>
    {{ $slot }}

    <!-- Checkmark active indicator -->
    <span 
        x-show="isSelected" 
        class="absolute inset-y-0 right-0 flex items-center pr-4 text-blue-600 dark:text-blue-500"
    >
        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143z" clip-rule="evenodd" />
        </svg>
    </span>
</li>
