@props([
    'placeholder' => 'Type a message...',
])

<div {{ $attributes->class(['card p-2 shadow-none border-1']) }}>
    <div class="d-flex align-items-center">
        <!-- Composer (Textarea auto-resizing is ideal here) -->
        <textarea 
            rows="1"
            x-data="{
                resize() {
                    this.$el.style.height = 'auto';
                    this.$el.style.height = (this.$el.scrollHeight) + 'px';
                }
            }"
            @input="resize"
            x-init="resize"
            placeholder="{{ $placeholder }}"
            class="form-control border-0 shadow-none flex-fill resize-none bg-transparent"
            style="min-height: 40px; max-height: 200px;"
        ></textarea>
        
        <!-- Composer Actions (like Send button) -->
        <div class="ms-2 d-flex shrink-0 align-items-center gap-2">
            {{ $slot }}
        </div>
    </div>
</div>
