@if ($vins->hasPages())
        <div class="flex flex-col items-center">
            <span class="text-sm text-gray-600">
                Showing <span class="font-semibold">{{ $vins->firstItem() }}</span> to <span
                    class="font-semiboldn ">{{ $vins->lastItem() }} </span> of <span
                    class="font-semibold">{{ $vins->total() }}</span> Entries
            </span>
            <!-- Buttons -->
            <div class="inline-flex mt-2 xs:mt-0">
                @if ($vins->onFirstPage())
                    <button disabled
                        class="flex items-center justify-center px-4 h-10 text-base font-medium text-white bg-gray-800 rounded-s hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        Prev
                    </button>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev"
                        class="flex items-center justify-center px-4 h-10 text-base font-medium text-white bg-gray-800 rounded-s hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        Prev
                    </button>
                @endif
                @if ($vins->onLastPage())
                    <button disabled
                        class="flex items-center justify-center px-4 h-10 text-base font-medium text-white bg-gray-800 border-0 border-s border-gray-700 rounded-e hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        Next
                    </button>
                @else
                <button wire:click="nextPage" wire:loading.attr="disabled" rel="next"
                        class="flex items-center justify-center px-4 h-10 text-base font-medium text-white bg-gray-800 border-0 border-s border-gray-700 rounded-e hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        Next
                    </button>
                @endif
            </div>
    @endif
