@props([
    'name' => null, // Identifies command palette
])

<div 
    x-data="{
        search: '',
        open: true,
        focusInput() {
            this.$nextTick(() => {
                let input = this.$el.querySelector('input[type=text]');
                if (input) input.focus();
            });
        }
    }"
    @keydown.escape.window="open = false"
    x-effect="focusInput"
    {{ $attributes->class(['card shadow-lg border-0']) }}
    role="dialog"
>
    {{ $slot }}
</div>
