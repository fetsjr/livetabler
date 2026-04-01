@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-4 w-full text-sm text-gray-700 dark:text-gray-300">
        
        <div class="flex items-center gap-2">
            <span class="font-medium text-gray-500 dark:text-gray-400">
                {!! __('Showing :first to :last of :total results', [
                    'first' => '<span class="text-gray-900 dark:text-white">' . $paginator->firstItem() . '</span>',
                    'last' => '<span class="text-gray-900 dark:text-white">' . $paginator->lastItem() . '</span>',
                    'total' => '<span class="text-gray-900 dark:text-white">' . $paginator->total() . '</span>',
                ]) !!}
            </span>
        </div>

        <div class="flex items-center gap-2">
            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-400 shadow-sm cursor-not-allowed dark:border-zinc-800 dark:bg-zinc-800/50 dark:text-gray-500">
                    {!! __('Previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-gray-200 dark:hover:bg-zinc-800 transition-colors">
                    {!! __('Previous') !!}
                </a>
            @endif

            <!-- Standard Tabler pagination numbers -->
            <div class="hidden sm:flex gap-1 items-center">
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span class="px-3 py-2 text-sm text-gray-500">{{ $element }}</span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="rounded-md bg-blue-50 text-blue-600 px-3.5 py-2 text-sm font-bold shadow-sm dark:bg-blue-500/20 dark:text-blue-400">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}" class="rounded-md text-gray-700 hover:bg-gray-100 px-3 py-2 text-sm font-medium dark:text-gray-300 dark:hover:bg-zinc-800 dark:hover:text-white transition-colors">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-gray-200 dark:hover:bg-zinc-800 transition-colors">
                    {!! __('Next') !!}
                </a>
            @else
                <span class="inline-flex items-center rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-400 shadow-sm cursor-not-allowed dark:border-zinc-800 dark:bg-zinc-800/50 dark:text-gray-500">
                    {!! __('Next') !!}
                </span>
            @endif
        </div>
    </nav>
@endif
