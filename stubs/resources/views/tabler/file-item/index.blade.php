@props([
    'name' => 'File.txt',
    'size' => '',
])

<div {{ $attributes->class(['flex items-center justify-between p-3 rounded-lg border border-gray-200 bg-white shadow-sm dark:border-zinc-800 dark:bg-zinc-900']) }}>
    <div class="flex items-center gap-3">
        <!-- Generic Icon -->
        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-md bg-blue-50 text-blue-600 dark:bg-blue-500/20 dark:text-blue-400">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
        </div>
        <div class="flex flex-col">
            <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $name }}</span>
            @if($size)
                <span class="text-xs text-gray-500 dark:text-gray-400">{{ $size }}</span>
            @endif
        </div>
    </div>
    <div class="pl-3">
        {{ $slot }}
    </div>
</div>
