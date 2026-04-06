<ul 
    role="listbox" 
    {{ $attributes->class(['overflow-auto p-2 small text-dark']) }}
    style="max-height: 20rem;"
>
    <!-- Alpine JS dynamic logic works best when items use x-show to filter -->
    {{ $slot }}
</ul>
