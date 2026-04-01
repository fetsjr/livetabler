@props([
    'length' => 6,
    'name' => $attributes->whereStartsWith('wire:model')->first(),
])

@php
    $inputClasses = "w-10 h-12 text-center text-lg font-semibold rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-zinc-900 dark:border-zinc-700 dark:text-white dark:focus:ring-blue-500 uppercase";
@endphp

<div 
    x-data="{
        length: {{ $length }},
        value: Array.from({ length: {{ $length }} }).fill(''),
        updateLivewire() {
            @if($name)
                $wire.set('{{ $name }}', this.value.join(''));
            @endif
        },
        handleInput(index, event) {
            let val = event.target.value.toUpperCase();
            // take only the last character entered
            if(val.length > 1) { val = val.slice(-1); }
            this.value[index] = val;
            
            if (val && index < this.length - 1) {
                this.$refs['input' + (index + 1)].focus();
            }
            this.updateLivewire();
            
            // force value visual update to uppercase
            event.target.value = val;
        },
        handleKeydown(index, event) {
            if (event.key === 'Backspace' && !this.value[index] && index > 0) {
                this.$refs['input' + (index - 1)].focus();
            }
        },
        handlePaste(event) {
            event.preventDefault();
            const pasteData = event.clipboardData.getData('text').trim().toUpperCase();
            if(!pasteData) return;
            
            for(let i=0; i<this.length && i<pasteData.length; i++) {
                this.value[i] = pasteData[i];
                if(this.$refs['input' + i]) {
                    this.$refs['input' + i].value = pasteData[i];
                }
            }
            this.updateLivewire();
            
            // Focus last filled
            const focusIndex = Math.min(pasteData.length, this.length - 1);
            if(this.$refs['input' + focusIndex]) {
                this.$refs['input' + focusIndex].focus();
            }
        }
    }"
    class="flex items-center gap-2"
    {{ $attributes->whereDoesntStartWith('wire:model') }}
>
    <template x-for="i in Array.from({length: length}).map((_, i) => i)">
        <input 
            type="text" 
            maxlength="2"
            x-ref="'input' + i"
            :value="value[i]"
            @input="handleInput(i, $event)"
            @keydown="handleKeydown(i, $event)"
            @paste="handlePaste"
            class="{{ $inputClasses }}"
        />
    </template>
</div>
