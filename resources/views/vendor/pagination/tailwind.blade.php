@if ($paginator->hasPages())
    <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4 mt-5" role="navigation" aria-label="Pagination Navigation">
        <span class="text-sm font-normal text-[#35408e] mb-4 md:mb-0 block w-full md:inline md:w-auto">
            Showing 
            <span class="font-semibold text-[#35408e]">{{ $paginator->firstItem() }}</span> 
            to 
            <span class="font-semibold text-[#35408e]">{{ $paginator->lastItem() }}</span> 
            of 
            <span class="font-semibold text-[#35408e]">{{ $paginator->total() }}</span>
        </span>

        <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-white bg-gray-300 border border-gray-300 rounded-s-lg cursor-not-allowed">Previous</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-white bg-[#35408e] border border-[#35408e] rounded-s-lg hover:bg-[#242c67] hover:text-white">Previous</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li>
                        <span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300">{{ $element }}</span>
                    </li>
                @endif

                {{-- Page Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-[#35408e]">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="flex items-center justify-center px-3 h-8 leading-tight text-white bg-[#35408e] border border-gray-300 hover:bg-[#242c67] hover:text-white">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 leading-tight text-white bg-[#35408e] border border-gray-300 rounded-e-lg hover:bg-[#242c67] hover:text-white">Next</a>
                </li>
            @else
                <li>
                    <span class="flex items-center justify-center px-3 h-8 leading-tight text-white bg-gray-300 border border-gray-300 rounded-e-lg cursor-not-allowed">Next</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
