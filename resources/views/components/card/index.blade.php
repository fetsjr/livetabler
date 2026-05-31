@php
    $classes = 'card';
    
    if ($sm ?? false) $classes .= ' card-sm';
    if ($stacked ?? false) $classes .= ' card-stacked';

    $attributes = $attributes->class([$classes]);
@endphp

<div {{ $attributes }}>
    @if ($status ?? null)
        <div class="card-status-top bg-{{ $status }}"></div>
    @endif

    @if (($title ?? null) || ($header ?? null) || ($actions ?? null))
        <div class="card-header">
            @if ($title ?? null)
                <h3 class="card-title">{{ $title }}</h3>
            @endif
            
            {{ $header ?? '' }}

            @if ($actions ?? null)
                <div class="card-actions">
                    {{ $actions }}
                </div>
            @endif
        </div>
    @endif

    @if ($body ?? null)
        <div class="card-body">
            {{ $body }}
        </div>
    @else
        {{ $slot }}
    @endif

    @if ($footer ?? null)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endif
</div>
