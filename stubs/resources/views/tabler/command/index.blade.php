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
    @keydown.escape.window="open = false" /* you can bind this externally to a modal if pallete is modal */
    x-effect="focusInput"
    {{ $attributes->class(['flex flex-col overflow-hidden rounded-xl bg-white shadow-2xl dark:bg-zinc-900 border border-gray-100 dark:border-zinc-800 ring-1 ring-black/5']) }}
    data-tabler-command
    role="dialog"
>
    {{ $slot }}
</div>
