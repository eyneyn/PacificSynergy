@extends('layouts.adminNavbar')

@section('content')
    <!-- Heading -->
    <nav class="flex mb-4" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
        <li class="inline-flex items-center">
        <a href="{{url('admin/index')}}" class="inline-flex items-center text-sm font-medium text-blue-800 hover:text-blue-600">
            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
            </svg>
            Senior Production
        </a>
        </li>
        <li>
        <div class="flex items-center">
            <svg class="w-3 h-3 text-blue-800 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            {{-- <a href="#" class="ms-1 text-sm font-medium text-blue-800 hover:text-blue-600 md:ms-2">Production Reports</a> --}}
        </div>
        </li>
    </ol>
    </nav>

    <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-blue-950 md:text-3xl">Production Reports</h2>


    

<div class="mt-10 overflow-x-auto">
    <div class="flex flex-column sm:flex-row flex-wrap space-y-4 justify-between sm:space-y-0 items-center pb-4">
        <!-- Search days -->
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-5 h-5 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="table-search" class="block p-2 ps-10 text-sm text-white border border-[#242c67] rounded-lg w-80 bg-[#242c67] focus:ring-[#242c67] focus:border-[#242c67]" placeholder="Search for production report">
        </div>
        <!-- New report -->
    <a href=""
        class="inline-flex items-center gap-2 px-5 py-2 rounded-lg text-white bg-[#242c67] hover:bg-[#1e2d57] shadow-md transition-all duration-300">
        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M256 85.333c-94.257 0-170.667 76.41-170.667 170.667S161.743 426.667 256 426.667 426.667 350.257 426.667 256 350.257 85.333 256 85.333zm85.333 192H277.333v63.999h-42.666v-63.999H170.667v-42.667h63.999v-63.999h42.666v63.999H341.333v42.667z" />
        </svg>
        <span class="text-sm">Daily Production Report</span>
    </a>
    </div>

    <!-- Filter days -->
    <div class="flex space-x-4 mt-4 mb-2">
        <button class="px-4 py-1.5 text-sm cursor-pointer font-medium text-[#35408e] border border-[#35408e] rounded-full focus:outline-none focus:ring-2 focus:ring-[#35408e] bg-white">
            Last 7 Days
        </button>
        <button class="px-4 py-1.5 text-sm cursor-pointer font-medium text-gray-700 hover:text-[#35408e]">
            Last 30 Days
        </button>
            <button class="px-4 py-1.5 text-sm cursor-pointer font-medium text-gray-700 hover:text-[#35408e]">
            Last Month
        </button>
        <button class="px-4 py-1.5 text-sm cursor-pointer font-medium text-gray-700 hover:text-[#35408e]">
            Last Year
        </button>
    </div>

    <table class="w-full mt-4 text-sm text-left rtl:text-right border border-[#35408e]">
        <thead class="text-xs text-white uppercase bg-[#35408e]">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Production Date
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Line #
                        <a href="#">
                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                            </svg>
                        </a>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Submitted Date and Time
                        <a href="#">
                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                            </svg>
                        </a>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Status
                        <a href="#">
                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                            </svg>
                        </a>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b border-[#35408e] hover:bg-[#e5f4ff]">
                <th scope="row" class="px-6 py-4 font-medium text-[#35408e] whitespace-nowrap">
                    Apple MacBook Pro 17
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white border-b border-[#35408e] hover:bg-[#e5f4ff]">
                <th scope="row" class="px-6 py-4 font-medium text-[#35408e] whitespace-nowrap">
                    Apple MacBook Pro 17
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white border-b border-[#35408e] hover:bg-[#e5f4ff]">
                <th scope="row" class="px-6 py-4 font-medium text-[#35408e] whitespace-nowrap">
                    Apple MacBook Pro 17
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white border-b border-[#35408e] hover:bg-[#e5f4ff]">
                <th scope="row" class="px-6 py-4 font-medium text-[#35408e] whitespace-nowrap">
                    Apple MacBook Pro 17
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white border-b border-[#35408e] hover:bg-[#e5f4ff]">
                <th scope="row" class="px-6 py-4 font-medium text-[#35408e] whitespace-nowrap">
                    Apple MacBook Pro 17
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white border-b border-[#35408e] hover:bg-[#e5f4ff]">
                <th scope="row" class="px-6 py-4 font-medium text-[#35408e] whitespace-nowrap">
                    Apple MacBook Pro 17
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
                        <tr class="bg-white border-b border-[#35408e] hover:bg-[#e5f4ff]">
                <th scope="row" class="px-6 py-4 font-medium text-[#35408e] whitespace-nowrap">
                    Apple MacBook Pro 17
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
                        <tr class="bg-white border-b border-[#35408e] hover:bg-[#e5f4ff]">
                <th scope="row" class="px-6 py-4 font-medium text-[#35408e] whitespace-nowrap">
                    Apple MacBook Pro 17
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
                        <tr class="bg-white border-b border-[#35408e] hover:bg-[#e5f4ff]">
                <th scope="row" class="px-6 py-4 font-medium text-[#35408e] whitespace-nowrap">
                    Apple MacBook Pro 17
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
                        <tr class="bg-white border-b border-[#35408e] hover:bg-[#e5f4ff]">
                <th scope="row" class="px-6 py-4 font-medium text-[#35408e] whitespace-nowrap">
                    Apple MacBook Pro 17
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Pagination -->
    <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4 mt-5" aria-label="Table navigation">
        <span class="text-sm font-normal text-#35408e mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing <span class="font-semibold text-[#35408e]">1 - 10</span> of <span class="font-semibold text-[#35408e]">1000</span></span>
        <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
            <li>
                <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-white bg-[#35408e] border border-[#35408e] rounded-s-lg hover:bg-[#242c67] hover:text-white">Previous</a>
            </li>
            <li>
                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-white bg-[#35408e] border border-gray-300 hover:bg-[#242c67] hover:text-white">1</a>
            </li>
            <li>
                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-white bg-[#35408e] border border-gray-300 hover:bg-[#242c67] hover:text-white">2</a>
            </li>
            <li>
                <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-[#35408e]">3</a>
            </li>
            <li>
                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-white bg-[#35408e] border border-gray-300 hover:bg-[#242c67] hover:text-white">4</a>
            </li>
            <li>
                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-white bg-[#35408e] border border-gray-300 hover:bg-[#242c67] hover:text-white">5</a>
            </li>
            <li>
        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-white bg-[#35408e] border border-gray-300 rounded-e-lg hover:bg-[#242c67] hover:text-white">Next</a>
            </li>
        </ul>
    </nav>
</div>

@endsection