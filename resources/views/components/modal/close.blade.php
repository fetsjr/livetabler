<div x-data @click="$el.closest('[x-data]').dispatchEvent(new Event('close-modal', {bubbles: true}))" {{ $attributes->class('contents') }}>
    {{ $slot }}
</div>
