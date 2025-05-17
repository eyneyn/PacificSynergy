@extends('layouts.navbar')

@section('content')

    <!-- Heading -->
    <nav class="flex mb-4" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
        <li class="inline-flex items-center">
          <a href="{{url('report/production_report')}}" class="inline-flex items-center text-xs font-medium text-blue-800 hover:text-blue-600">
              <svg class="w-2 h-2  me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
              </svg>
              Production Reports
          </a>
        </li>
        <li>
          <div class="flex items-center">
              <svg class="w-2 h-2  text-blue-800 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
              </svg>
          </div>
        </li>
    </ol>
    </nav>

    <div class="bg-white border border-gray-200 rounded-sm shadow-lg px-8 py-10 mt-5 mb-10 transition-all duration-300 hover:shadow-xl">
    
    <div class="flex flex-col sm:flex-row flex-wrap justify-between items-center space-y-4 sm:space-y-0 pb-4">    
        <!-- Search Form -->
        <form method="GET" action="{{ route('report.production_report') }}" class="flex items-center space-x-3">
            <div class="relative">
                <!-- Calendar/Search Icon -->
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-[#35408e]" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 
                                1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                </div>

                <!-- Date Input -->
                <input type="date" name="search" id="table-search"
                    value="{{ request('search') }}"
                    class="block pl-10 pr-4 py-2 text-sm text-blue-950 border border-[#242c67] rounded-lg bg-transparent rounded-lg w-64 focus:ring-[#242c67] focus:border-[#242c67]">
                        </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="cursor-pointer px-4 py-2 text-sm font-medium text-white bg-[#35408e] rounded-md hover:bg-[#242c67] transition-all">
                    Search
                </button>
        </form>

        <!-- New Report Button -->
        <a href="{{ url('add_production') }}"
        class="inline-flex items-center gap-2 px-5 py-2 rounded-lg text-white bg-[#242c67] hover:bg-[#1e2d57] shadow-md transition-all duration-300">
            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 512 512">
                <path
                    d="M256 85.333c-94.257 0-170.667 76.41-170.667 170.667S161.743 426.667 256 426.667 
                    426.667 350.257 426.667 256 350.257 85.333 256 85.333zm85.333 192H277.333v63.999h-42.666v-63.999H170.667v-42.667h63.999v-63.999h42.666v63.999H341.333v42.667z" />
            </svg>
            <span class="text-sm">Daily Production Report</span>
        </a>
    </div>

    <!-- Filter days -->
        <div class="flex space-x-4 mt-4 mb-2">
            <a href="{{ route('report.production_report', ['filter' => '7days']) }}"
                class="px-4 py-1.5 text-sm font-medium border rounded-md 
                    {{ $filter === '7days' ? 'bg-[#35408e] text-white border-[#35408e]' : 'text-[#35408e] border-[#35408e] hover:bg-[#35408e] hover:text-white' }}">
                Last 7 Days
            </a>
            <a href="{{ route('report.production_report', ['filter' => '30days']) }}"
                class="px-4 py-1.5 text-sm font-medium border rounded-md 
                    {{ $filter === '30days' ? 'bg-[#35408e] text-white border-[#35408e]' : 'text-[#35408e] border-[#35408e] hover:bg-[#35408e] hover:text-white' }}">
                Last 30 Days
            </a>
            <a href="{{ route('report.production_report', ['filter' => 'last_month']) }}"
                class="px-4 py-1.5 text-sm font-medium border rounded-md 
                    {{ $filter === 'last_month' ? 'bg-[#35408e] text-white border-[#35408e]' : 'text-[#35408e] border-[#35408e] hover:bg-[#35408e] hover:text-white' }}">
                Last Month
            </a>
            <a href="{{ route('report.production_report', ['filter' => 'last_year']) }}"
                class="px-4 py-1.5 text-sm font-medium border rounded-md 
                    {{ $filter === 'last_year' ? 'bg-[#35408e] text-white border-[#35408e]' : 'text-[#35408e] border-[#35408e] hover:bg-[#35408e] hover:text-white' }}">
                Last Year
            </a>
        </div>
        
        <table class="w-full mt-4 text-sm text-left rtl:text-right border border-[#35408e]">
            <thead class="text-xs text-white uppercase bg-[#35408e]">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Production Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            SKU's
                            <a href="{{ request()->fullUrlWithQuery([
                                'sort' => 'sku',
                                'direction' => (request('sort') === 'sku' && request('direction') === 'asc') ? 'desc' : 'asc'
                            ]) }}">
                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Line #
                            <a href="{{ request()->fullUrlWithQuery([
                                'sort' => 'line',
                                'direction' => (request('sort') === 'line' && request('direction') === 'asc') ? 'desc' : 'asc'
                            ]) }}">
                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Output cases
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Submitted Date and Time
                            <a href="{{ request()->fullUrlWithQuery([
                                'sort' => 'created_at',
                                'direction' => (request('sort') === 'created_at' && request('direction') === 'asc') ? 'desc' : 'asc'
                            ]) }}">
                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Status
                            <a href="{{ request()->fullUrlWithQuery([
                                'sort' => 'status',
                                'direction' => (request('sort') === 'status' && request('direction') === 'asc') ? 'desc' : 'asc'
                            ]) }}">
                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg>
                            </a>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reports as $report)
                    <tr class="bg-white border-b border-[#35408e] hover:bg-[#e5f4ff]">
                        <td class="px-6 py-4 font-medium text-[#35408e] whitespace-nowrap">
                            <a href="{{ route('report.view_report', ['id' => $report->id]) }}" class="hover:underline text-[#35408e]">
                                {{ $report->production_date }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            {{ $report->sku }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $report->line }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $report->total_outputCase}}
                        </td>
                        <td class="px-6 py-4">
                            {{ $report->created_at->format('Y-m-d H:i') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $report->status}}
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                        @if ($search)
                            No reports found for <strong>{{ $search }}</strong>.
                        @elseif ($filter)
                            No reports found for selected filter.
                        @else
                            No production reports available.
                        @endif
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $reports->links('pagination::tailwind') }}
        </div>
    </div>


@endsection