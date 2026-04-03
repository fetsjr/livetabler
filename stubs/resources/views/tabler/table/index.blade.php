@props([
    'paginate' => null,
    'card' => true,
])

@php
    $tableClasses = 'table table-vcenter';
    
    if ($card) {
        $tableClasses .= ' card-table';
    }
@endphp

<div {{ $attributes->only('class')->class(['table-responsive']) }}>
    {{ $header ?? '' }}

    <table {{ $attributes->except('class')->class([$tableClasses]) }}>
        {{ $slot }}
    </table>

    {{ $footer ?? '' }}

    @if ($paginate)
        <div class="card-footer d-flex align-items-center">
            {{ $paginate->links() }}
        </div>
    @endif
</div>
