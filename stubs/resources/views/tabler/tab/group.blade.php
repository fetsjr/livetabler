<div 
    {{ $attributes->class(['flex flex-wrap items-center gap-1 border-b border-gray-200 dark:border-zinc-800']) }}
    role="tablist"
>
    <!-- We inject an internal context for Tabs via class structure without polluting global scope -->
    {{ $slot }}
</div>
