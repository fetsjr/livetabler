<div 
    x-show="isOpen" 
    style="display: none;"
    x-collapse
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 max-h-0"
    x-transition:enter-end="opacity-100 max-h-screen"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 max-h-screen"
    x-transition:leave-end="opacity-0 max-h-0"
    {{ $attributes->class(['overflow-hidden']) }}
>
    <!-- Content wrapper for padding -->
    <div class="p-4 pt-1 text-sm text-gray-600 dark:text-gray-400">
        {{ $slot }}
    </div>
</div>
