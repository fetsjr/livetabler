<div {{ $attributes->class(['w-full rounded-xl border border-gray-200 dark:border-zinc-700 overflow-hidden bg-white dark:bg-zinc-900 shadow-sm']) }}>
    <!-- Headings / Toolbar could be injected here -->
    <div class="bg-gray-50 border-b border-gray-200 dark:bg-zinc-800/50 dark:border-zinc-700 p-2 flex items-center gap-1 overflow-x-auto text-gray-600 dark:text-gray-300">
         <!-- This is a generic toolbar space for Trix or Quill if the user integrates it -->
         <p class="text-xs font-semibold px-2 uppercase tracking-wide opacity-50 select-none">Rich Text Editor Area</p>
    </div>
    
    <!-- Render content or input area -->
    <div class="min-h-[150px] p-4 text-sm text-gray-800 dark:text-gray-200 prose dark:prose-invert max-w-none">
        {{ $slot }}
    </div>
</div>
