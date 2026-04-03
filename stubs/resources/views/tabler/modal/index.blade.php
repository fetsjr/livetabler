@php
    $dialogClasses = 'modal-dialog';
    
    if ($size !== 'md') {
        $dialogClasses .= " modal-{$size}";
    }
    
    if ($scrollable ?? false) {
        $dialogClasses .= " modal-dialog-scrollable";
    }
@endphp

<div class="modal modal-blur fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="{{ $dialogClasses }} modal-dialog-centered" role="document">
        <div class="modal-content">
            @if ($status ?? null)
                <div class="modal-status bg-{{ $status }}"></div>
            @endif

            <div class="modal-header">
                <h5 class="modal-title">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                {{ $slot }}
            </div>

            @if ($footer ?? null)
                <div class="modal-footer">
                    {{ $footer }}
                </div>
            @endif
        </div>
    </div>
</div>
