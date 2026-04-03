<div @class([
    'placeholder-glow' => $glow,
]) {{ $attributes }}>
    @if ($circle)
        <div @class([
            'placeholder rounded-circle',
            'avatar-' . ($size === 'md' ? 'md' : $size) => $size !== 'lg',
            'avatar-xl' => $size === 'lg',
        ])></div>
    @else
        @for ($i = 0; $i < $lines; $i++)
            <div @class([
                'placeholder w-100' => $lines > 1,
                'placeholder' => $lines === 1,
                'placeholder-' . $size => $size !== 'md',
                'col-' . $width => $lines === 1,
                'mb-2' => $lines > 1 && $i < $lines - 1,
            ]) @if ($lines > 1) 
                 style="width: {{ $i % 2 === 0 ? '100' : '75' }}% !important;" 
               @endif></div>
        @endfor
    @endif
</div>
