@props([
    'value' => null, // The underlying data value for the form
])

<div 
    x-data="{
        val: '{{ $value }}',
        text: '',
        get isSelected() {
            return this.selectedList.findIndex(i => i.val === this.val) > -1;
        },
        init() {
            // grab the text content of the choice for badge displays
            this.text = this.$el.innerText.trim();
        }
    }"
    x-show="search === '' || text.toLowerCase().includes(search.toLowerCase())"
    @click="toggleSelection(val, text)"
    class="relative cursor-default select-none py-2 pl-3 pr-9 hover:bg-gray-100 dark:hover:bg-zinc-700 text-gray-900 dark:text-gray-200 transition-colors"
    :class="{ 'bg-blue-50 dark:bg-blue-900/30 text-blue-900 dark:text-blue-200': isSelected }"
    role="option"
    tabindex="0"
>
    <div class="flex items-center gap-2">
        {{ $slot }}
    </div>

    <!-- Active Indicator Checkmark -->
    <span 
        x-show="isSelected" 
        class="absolute inset-y-0 right-0 flex items-center pr-4 text-blue-600 dark:text-blue-500"
    >
        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143z" clip-rule="evenodd" />
        </svg>
    </span>
</div>
