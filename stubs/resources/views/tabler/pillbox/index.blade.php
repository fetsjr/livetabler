@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'placeholder' => 'Select items...',
])

<div 
    x-data="{ 
        open: false,
        search: '',
        selectedList: [],  // Handles the pillbox IDs locally for immediate UI response
        
        toggleSelection(val, text) {
            const idx = this.selectedList.findIndex(i => i.val === val);
            if (idx > -1) {
                this.selectedList.splice(idx, 1);
            } else {
                this.selectedList.push({ val: val, text: text });
            }
            this.updateExternal();
        },
        removeSelection(val) {
            this.selectedList = this.selectedList.filter(i => i.val !== val);
            this.updateExternal();
        },
        updateExternal() {
            @if($name)
                $wire.set('{{ $name }}', this.selectedList.map(i => i.val));
            @endif
        }
    }"
    @keydown.escape.window="open = false" /* close on explicit escape */
    {{ $attributes->class(['relative w-full']) }}
    data-tabler-pillbox
>
    <!-- Hidden input to store values for standard form submission if not using Livewire -->
    <template x-for="item in selectedList" :key="item.val">
        <input type="hidden" name="{{ $name }}[]" x-bind:value="item.val" />
    </template>

    {{ $slot }}
</div>
