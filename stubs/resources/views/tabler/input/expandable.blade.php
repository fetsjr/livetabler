<div
    x-data="{ expanded: false }"
    {{ $attributes->class(['relative']) }}
>
    <div class="[&>textarea]:overflow-hidden [&>textarea]:resize-none" :class="expanded ? '' : '[&>textarea]:max-h-20'">
        {{ $slot }}
    </div>
    <button
        type="button"
        @click="expanded = !expanded"
        class="absolute bottom-1 right-1 p-1 text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-300"
    >
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path x-show="!expanded" stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
            <path x-show="expanded" x-cloak stroke-linecap="round" stroke-linejoin="round" d="M9 9V4.5M9 9H4.5M9 9L3.75 3.75M9 15v4.5M9 15H4.5M9 15l-5.25 5.25M15 9h4.5M15 9V4.5M15 9l5.25-5.25M15 15h4.5M15 15v4.5m0-4.5l5.25 5.25" />
        </svg>
    </button>
</div>
