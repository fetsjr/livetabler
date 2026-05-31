@props([
    'index' => 0,
])

<input
    type="text"
    inputmode="numeric"
    maxlength="1"
    pattern="[0-9]"
    autocomplete="one-time-code"
    x-on:input="$event.target.value = $event.target.value.replace(/[^0-9]/g, ''); if ($event.target.value) $event.target.nextElementSibling?.focus()"
    x-on:keydown.backspace="if (!$event.target.value) $event.target.previousElementSibling?.focus()"
    x-on:paste.prevent="
        let paste = ($event.clipboardData || window.clipboardData).getData('text').replace(/[^0-9]/g, '');
        let inputs = $el.parentElement.querySelectorAll('input');
        paste.split('').forEach((char, i) => { if (inputs[i]) inputs[i].value = char; });
        inputs[Math.min(paste.length, inputs.length) - 1]?.focus();
    "
    {{ $attributes->class(['form-control text-center fs-4 fw-semibold p-0 shadow-none']) }}
    style="width: 2.5rem; height: 2.5rem;"
/>
