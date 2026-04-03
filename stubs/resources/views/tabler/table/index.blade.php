@php
    $tableClasses = 'table table-vcenter';
    
    if ($striped ?? false) {
        $tableClasses .= ' table-striped';
    }
    
    if ($hover ?? true) {
        $tableClasses .= ' table-hover';
    }

    if ($card ?? false) {
        $tableClasses .= ' card-table';
    }

    $attributes = $attributes->class([]);
@endphp

<div class="{{ ($responsive ?? true) ? 'table-responsive' : '' }}">
    <table {{ $attributes->merge(['class' => $tableClasses]) }}>
        {{ $slot }}
    </table>

    @if ($pagination ?? null)
        <div class="card-footer d-flex align-items-center">
            {{ $pagination }}
        </div>
    @endif
</div>
