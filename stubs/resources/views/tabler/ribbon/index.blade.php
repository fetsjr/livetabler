<div @class([
    'ribbon',
    'ribbon-bookmark' => $bookmark,
    'ribbon-' . $position,
    'bg-' . $color,
]) {{ $attributes }}>
    {{ $slot }}
</div>
