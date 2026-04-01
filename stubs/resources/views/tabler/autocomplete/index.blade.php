@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'placeholder' => 'Search or select...',
])

<div 
    x-data="{
        open: false,
        search: '',
        value: @if($attributes->has('wire:model')) $wire.entangle('{{ $name }}') @else '' @endif,
        selectOption(val, text) {
            this.value = val;
            this.search = text; // autocomplete reflects the name in input
            this.open = false;
        }
    }"
    @keydown.escape.window="open = false"
    @click.outside="open = false"
    {{ $attributes->class(['relative w-full']) }}
    data-tabler-autocomplete
>
    <!-- Hidden input to submit standard form if livewire is absent -->
    <input type="hidden" name="{{ $name }}" x-model="value" />

    <div class="relative w-full">
        <!-- Input box -->
        <input 
            type="text" 
            x-model="search"
            @focus="open = true"
            @click="open = true"
            placeholder="{{ $placeholder }}"
            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm pl-3 pr-10 py-2 dark:border-zinc-700 dark:bg-zinc-900 dark:text-gray-200 dark:focus:ring-blue-500"
        />

        <!-- Chevrons icon similar to combobox -->
        <button 
            type="button" 
            @click="open = !open" 
            class="absolute inset-y-0 right-0 flex items-center pr-2 focus:outline-none"
        >
            <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    {{ $slot }}
</div>
