@php
    $position = $position ?? 'top';
    $color = $color ?? 'primary';
    $bookmark = $bookmark ?? false;
@endphp

<div @class([
    'ribbon',
    'ribbon-bookmark' => $bookmark,
    'ribbon-' . $position,
    'bg-' . $color,
]) {{ $attributes }}>
    {{ $slot }}
</div>

@php
    $id = $id ?? 'dt-' . Str::random(8);
    $columns = $columns ?? [];
    $url = $url ?? null;
    $searchable = $searchable ?? true;
    $paginated = $paginated ?? true;
@endphp

@php
    $id = $id ?? 'chart-' . Str::random(8);
    $type = $type ?? 'line';
    $height = $height ?? '350';
    $options = $options ?? [];
@endphp

<div id="{{ $id }}" style="min-height: {{ $height }}px;" {{ $attributes }}></div>
