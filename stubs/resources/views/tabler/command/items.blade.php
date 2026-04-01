<ul 
    role="listbox" 
    {{ $attributes->class(['max-h-80 scroll-py-2 overflow-y-auto p-2 text-sm text-gray-800 dark:text-gray-200']) }}
>
    <!-- Alpine JS dynamic logic works best when items use x-show to filter -->
    {{ $slot }}
</ul>
