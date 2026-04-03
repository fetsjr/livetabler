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
    {{ $attributes->class(['dropdown w-100']) }}
>
    <!-- Hidden input to submit standard form if livewire is absent -->
    <input type="hidden" name="{{ $name }}" x-model="value" />

    <div class="input-icon">
        <input 
            type="text" 
            x-model="search"
            @focus="open = true"
            @click="open = true"
            placeholder="{{ $placeholder }}"
            class="form-control"
        />
        <span class="input-icon-addon" @click="open = !open">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M18 13l-6 6" /><path d="M6 13l6 6" /></svg>
        </span>
    </div>

    <ul 
        class="dropdown-menu show w-100" 
        x-show="open" 
        x-cloak
        style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 40px);"
    >
        {{ $slot }}
    </ul>
</div>
