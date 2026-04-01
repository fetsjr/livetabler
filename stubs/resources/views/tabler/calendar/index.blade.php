@props([
    // Basic calendar block visually recreating a date page
    'month' => date('F'),
    'year' => date('Y'),
    'day' => date('d'),
])

<div {{ $attributes->class(['inline-flex flex-col items-center justify-center overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-zinc-800 dark:bg-zinc-900']) }}>
    <!-- Header -->
    <div class="w-full bg-red-500 px-4 py-1 text-center text-xs font-bold uppercase tracking-widest text-white dark:bg-red-600">
        {{ $month }} {{ $year }}
    </div>
    <!-- Body -->
    <div class="flex flex-1 items-center justify-center px-6 py-4">
        <span class="text-4xl font-extrabold text-gray-900 dark:text-white">
            {{ $day }}
        </span>
    </div>
</div>
