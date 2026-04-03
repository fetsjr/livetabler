@props([
    'month' => date('M'),
    'year' => date('Y'),
    'day' => date('d'),
])

<div {{ $attributes->class(['card card-sm d-inline-flex border-0 shadow-sm overflow-hidden']) }} style="width: 80px;">
    <div class="bg-danger text-white text-center py-1 small fw-bold uppercase">
        {{ $month }}
    </div>
    <div class="card-body text-center py-2 h2 mb-0 fw-bold">
        {{ $day }}
    </div>
</div>
