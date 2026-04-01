@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'label' => null,
    'description' => null,
])

@php
    /* 
     * Alpine JS is used here to natively recreate the custom toggle switch behavior 
     * of Tabler UI without relying on unsemantic HTML or custom Web Components (like <ui-switch>).
     */
@endphp

<div class="relative flex items-start mb-2" x-data="{ checked: @if($attributes->has('checked') || $attributes->has('wire:model')) $el.querySelector('input').checked @else false @endif }">
    <!-- Hidden real input -->
    <input 
        type="checkbox" 
        class="sr-only"
        @if ($name) name="{{ $name }}" id="{{ $name }}" {{ $attributes->wire('model') }} @endif
        @change="checked = $el.checked"
        {{ $attributes->except(['wire:model', 'class']) }}
    >
    
    <!-- Custom Switch UI -->
    <button 
        type="button" 
        class="relative inline-flex h-5 w-9 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-900 bg-gray-200 dark:bg-zinc-700" 
        x-bind:class="{ 'bg-blue-600 dark:bg-blue-500': checked, 'bg-gray-200 dark:bg-zinc-700': !checked }"
        role="switch" 
        aria-checked="false"
        x-bind:aria-checked="checked.toString()"
        @click="$el.previousElementSibling.click()"
    >
        <span class="sr-only">Use setting</span>
        <span 
            aria-hidden="true" 
            class="pointer-events-none inline-block h-4 w-4 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out translate-x-0"
            x-bind:class="{ 'translate-x-4': checked, 'translate-x-0': !checked }"
        ></span>
    </button>

    @if ($label || $slot->isNotEmpty())
        <div class="ms-3 text-sm">
            <label @if ($name) for="{{ $name }}" @endif class="font-medium text-gray-800 dark:text-gray-200 cursor-pointer select-none" @click="$el.parentElement.previousElementSibling.previousElementSibling.click()">
                {{ $label ?? $slot }}
            </label>
            @if ($description)
                <p class="text-gray-500 dark:text-gray-400 mt-0.5">{{ $description }}</p>
            @endif
        </div>
    @endif
</div>
