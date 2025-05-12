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
            Administrator
        </a>
        </li>
        <li>
        <div class="flex items-center">
            <svg class="w-3 h-3 text-blue-800 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            {{-- <a href="#" class="ms-1 text-sm font-medium text-blue-800 hover:text-blue-600 md:ms-2">User Management</a> --}}
        </div>
        </li>
    </ol>
    </nav>

    <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-blue-950 md:text-3xl">User management</h2>

    <div class="flex justify-between items-center mb-7 mt-10">
        <!-- Search button -->
        <form method="GET" action="{{ route('admin.index') }}" class="w-full max-w-sm">
            <label for="default-search" class="mb-2 text-sm font-medium text-[#0F1C39] sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-[#0F1C39]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                </div>
                <input type="search" name="search" id="default-search"
                    class="block w-full p-4 ps-10 text-sm text-blue-950 border border-[#242c67] rounded-lg bg-transparent focus:ring-[#242c67] focus:border-[#242c67]"
                    placeholder="Search user" value="{{ request('search') }}" />                
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-[#242c67] hover:bg-[#0F1C39] focus:ring-4 focus:outline-none focus:ring-[#242c67]/50 font-medium rounded-lg text-sm px-4 py-2">
                Search
                </button>
            </div>
        </form>

        <!-- New user -->
        <a href="{{ url('registration') }}" class="inline-flex items-center gap-2 px-5 py-3 rounded-lg text-white bg-[#242c67] hover:bg-[#1e2d57] shadow-md transition-all duration-300">
            <svg fill="#ffffff" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 612 612">
                <g>
                <path d="M269.272,310.198c86.177-0.005,117.184-86.291,125.301-157.169C404.572,65.715,363.282,0,269.272,0 
                    C175.274,0,133.963,65.71,143.97,153.029C152.095,223.907,183.093,310.204,269.272,310.198z"/>
                <path d="M457.707,346.115c2.773,0,5.528,0.083,8.264,0.235c-4.101-5.85-8.848-11.01-14.403-15.158 
                    c-16.559-12.359-38.005-16.414-56.964-23.864c-9.229-3.625-17.493-7.226-25.251-11.326 
                    c-26.184,28.715-60.329,43.736-100.091,43.74c-39.749,0-73.891-15.021-100.072-43.74c-7.758,4.101-16.024,7.701-25.251,11.326 
                    c-18.959,7.451-40.404,11.505-56.964,23.864c-28.638,21.375-36.039,69.46-41.854,102.26
                    c-4.799,27.076-8.023,54.707-8.964,82.209c-0.729,21.303,9.789,24.29,27.611,30.721c22.315,8.048,45.356,14.023,68.552,18.921
                    c44.797,9.46,90.973,16.729,136.95,17.054c22.278-0.159,44.601-1.956,66.792-4.833c-16.431-23.807-26.068-52.645-26.068-83.695
                    C309.995,412.378,376.258,346.115,457.707,346.115z"/>
                <path d="M457.707,375.658c-65.262,0-118.171,52.909-118.171,118.171S392.444,612,457.707,612s118.172-52.909,118.172-118.171 
                    C575.878,428.566,522.969,375.658,457.707,375.658z M509.407,514.103h-31.425v31.424c0,11.198-9.077,20.276-20.274,20.276
                    c-11.198,0-20.276-9.078-20.276-20.276v-31.424h-31.424c-11.198,0-20.276-9.077-20.276-20.276 
                    c0-11.198,9.077-20.276,20.276-20.276h31.424v-31.424c0-11.198,9.078-20.276,20.276-20.276
                    c11.198,0,20.274,9.078,20.274,20.276v31.424h31.425c11.198,0,20.276,9.078,20.276,20.276
                    C529.682,505.027,520.606,514.103,509.407,514.103z"/>
                </g>
            </svg>
            <span class="text-sm">Register Now</span>
        </a>
    </div>


    <!-- Container for cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($users as $user)
        @php $dropdownId = 'dropdown' . $user->id; $buttonId = 'dropdownButton' . $user->id; @endphp
        <div class="w-full max-w-xs bg-[#242c67] border border-[#242c67] rounded-lg shadow-sm">
            <div class="flex justify-end px-4 pt-4">
                <button id="{{ $buttonId }}" data-dropdown-toggle="{{ $dropdownId }}" class="text-[#242c67] hover:bg-[#242c67] focus:ring-2 focus:outline-none focus:ring-[#242c67] rounded-lg text-xs p-1" type="button">
                    <span class="sr-only">Open dropdown</span>
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                        <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                    </svg>
                </button>
                <div id="{{ $dropdownId }}" class="z-10 hidden text-sm list-none bg-[#35408e] divide-y divide-[#35408e] rounded-lg shadow-sm w-36">
                    <ul class="py-2" aria-labelledby="{{ $buttonId }}">
                        <li>
                            <a href="{{ route('admin.userUpdate', ['id' => $user->id]) }}" class="block px-4 py-2 text-white hover:bg-[#3c49a3]">Edit</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col items-center pb-6">
                <img class="w-20 h-20 mb-2 rounded-full shadow-lg object-cover" src="{{ $user->photo_url }}" alt="{{ $user->first_name }} {{ $user->last_name }}'s profile photo"/>
                <h5 class="mb-1 text-base font-medium text-gray-900">{{ $user->first_name}} {{ $user->last_name}}</h5>
                <span class="text-xs text-white">{{ $user->role_name}}</span>
                <span class="text-xs text-gray-500">Production Department</span>
            </div>
        </div>
        @endforeach
        @if($users->isEmpty())
            <div class="col-span-full flex items-center justify-center h-64">
                <p class="text-center text-gray-500 text-lg font-medium">
                    No users found.
                </p>
            </div>
        @endif
    </div>



@endsection