@php
    $itemId = $itemId ?? 'acc-' . uniqid();
    $title = $title ?? '';
    $active = $active ?? false;
@endphp

<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button {{ ($active ?? false) ? '' : 'collapsed' }}" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#{{ $itemId }}" 
                aria-expanded="{{ ($active ?? false) ? 'true' : 'false' }}">
            @if ($icon ?? null)
                <x-tabler::icon :name="$icon" class="me-2" />
            @endif
            {{ $title }}
        </button>
    </h2>
    <div id="{{ $itemId }}" 
         class="accordion-collapse collapse {{ ($active ?? false) ? 'show' : '' }}" 
         data-bs-parent="#{{ $attributes->get('parent-id') }}">
        <div class="accordion-body">
            {{ $slot }}
        </div>
    </div>
</div>
