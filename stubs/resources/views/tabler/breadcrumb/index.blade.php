<ol {{ $attributes->class(['breadcrumb']) }}>
    @foreach($items as $label => $url)
        <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
            @if(!$loop->last)
                <a href="{{ $url }}">{{ $label }}</a>
            @else
                {{ $label }}
            @endif
        </li>
    @endforeach
    
    {{ $slot }}
</ol>
