@props([
    // Numero de cajas/caracteres del codigo OTP.
    'length' => 6,

    // Campo de Livewire al que se sincroniza el codigo. Por defecto se toma del
    // primer atributo wire:model presente (p. ej. wire:model="codigo" -> name="codigo"),
    // de modo que el consumidor solo tiene que escribir wire:model y funciona.
    'name' => $attributes->whereStartsWith('wire:model')->first(),
])

{{-- Raiz: arranca el estado Alpine con todo el comportamiento OTP (foco automatico
     a la siguiente caja, retroceso, pegado) y fusiona las clases del consumidor.
     El wire:model NO se reemite aqui: solo se usa para resolver el name. --}}
<div
    x-data="{
        length: {{ $length }},
        value: Array.from({ length: {{ $length }} }).fill(''),
        updateLivewire() {
            @if($name)
                this.$wire.set('{{ $name }}', this.value.join(''));
            @endif
        },
        handleInput(index, event) {
            let val = event.target.value.toUpperCase();
            if(val.length > 1) { val = val.slice(-1); }
            this.value[index] = val;

            if (val && index < this.length - 1) {
                this.$refs['input' + (index + 1)].focus();
            }
            this.updateLivewire();
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

            const focusIndex = Math.min(pasteData.length, this.length - 1);
            if(this.$refs['input' + focusIndex]) {
                this.$refs['input' + focusIndex].focus();
            }
        }
    }"
    {{ $attributes->whereDoesntStartWith('wire:model')->class([
        'd-flex align-items-center gap-2',  // layout en fila con separacion entre cajas
    ]) }}
>
    {{-- Una caja .form-control por caracter, centrada y de tamano fijo de un solo digito. --}}
    @for($i = 0; $i < $length; $i++)
        <input
            type="text"
            maxlength="2"
            x-ref="input{{ $i }}"
            :value="value[{{ $i }}]"
            @input="handleInput({{ $i }}, $event)"
            @keydown="handleKeydown({{ $i }}, $event)"
            @paste="handlePaste"
            class="form-control text-center fw-bold"
            style="width: 45px; height: 55px; font-size: 1.25rem;"
        />
    @endfor
</div>
