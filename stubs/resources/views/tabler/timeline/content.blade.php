<div {{ $attributes->class(['flex flex-col flex-1 pb-4 pt-1']) }}>
    <!-- Right side content next to the timeline indicator -->
    <div class="text-sm text-gray-800 dark:text-gray-200">
        {{ $slot }}
    </div>
</div>
