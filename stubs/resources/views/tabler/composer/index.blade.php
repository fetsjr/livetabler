@props([
    'placeholder' => 'Type a message...',
])

<div {{ $attributes->class(['relative flex items-center w-full rounded-2xl border border-gray-300 bg-white focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 dark:border-zinc-700 dark:bg-zinc-900 shadow-sm']) }}>
    <!-- Composer (Textarea auto-resizing is ideal here) -->
    <textarea 
        rows="1"
        x-data="{
            resize() {
                $el.style.height = 'auto';
                $el.style.height = ($el.scrollHeight) + 'px';
            }
        }"
        @input="resize"
        x-init="resize"
        placeholder="{{ $placeholder }}"
        class="flex-1 max-h-60 resize-none bg-transparent p-4 w-full outline-none text-gray-900 dark:text-gray-100 placeholder-gray-400"
    ></textarea>
    
    <!-- Composer Actions (like Send button) -->
    <div class="pr-3 flex shrink-0 items-center gap-2">
        {{ $slot }}
    </div>
</div>
