@props(['meta' => [], 'links' => [], 'currentPage' => '1'])
<div class="flex lg:justify-end justify-center w-full">
    <nav aria-label="Page navigation example">
        <ul class="flex items-center -space-x-px h-8 text-sm">

            @foreach ($meta['links'] as $link)
                @if($loop->first)
                    <li>
                        <button role="button" wire:click="pagination('prev')"
                            @disabled($links['prev'] == null)
                            class="disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Previous</span>
                            <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 1 1 5l4 4" />
                            </svg>
                        </button>
                    </li>
                @elseif(!$loop->last && !$loop->first)
                    <li>
                        <button role="button" wire:click="pagination({{$link['label']}})"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 {{ $currentPage == $link['label'] ? 'bg-gray-100 dark:bg-gray-700' : ' bg-white dark:bg-gray-800' }}  border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            {{$link['label']}}
                        </button>
                    </li>
                @else
                    <li>
                        <button role="button" wire:click="pagination('next')"
                            @disabled($links['next'] == null)
                            class="disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Next</span>
                            <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                        </button>
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
</div>
