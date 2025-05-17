@extends('layouts.navbar')

@section('content')

    <!-- Heading -->
    <nav class="flex mb-4" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
        <li class="inline-flex items-center">
          <a href="{{url('admin/index')}}" class="inline-flex items-center text-xs font-medium text-blue-800 hover:text-blue-600">
              <svg class="w-2 h-2  me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
              </svg>
              User Management
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
        
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-5 gap-4 md:gap-0 ">

    <!-- 🔽 Filter by Role (Left side) -->
    @php
        $roleLabels = [
            0 => 'Senior',
            1 => 'Analyst',
            2 => 'Manager',
            3 => 'Admin',
        ];
    @endphp

    <form method="GET" action="{{ route('admin.index') }}" class="flex items-center gap-3">
        <label for="role" class="text-sm font-medium text-blue-950">Filter by role:</label>
        <select name="role" id="role"
            class="block w-48 text-sm text-blue-950 border border-[#242c67] bg-white rounded-lg py-2 px-3 shadow-sm focus:ring-[#242c67] focus:border-[#242c67]">
            <option value="">All Roles</option>
            @foreach($roleLabels as $key => $label)
                <option value="{{ $label }}" {{ request('role') == $label ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        </select>
        <button type="submit"
            class="px-3 py-2 text-sm font-medium text-white bg-[#242c67] hover:bg-[#0F1C39] rounded-lg">
            Apply
        </button>
    </form>


    <!-- 🔍 Search + ➕ New User (Right side) -->
    <div class="flex flex-col sm:flex-row items-center gap-3">
            <!-- Search -->
            <form method="GET" action="{{ route('admin.index') }}" class="flex items-center gap-2 w-full sm:w-[250px]">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-[#35408e]" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                        </svg>
                    </div>
                    <input type="search" name="search" id="default-search"
                        class="block w-full pl-10 pr-4 py-2 text-sm text-blue-950 border border-[#242c67] rounded-lg bg-white focus:ring-[#242c67] focus:border-[#242c67] shadow-sm"
                        placeholder="Search user" value="{{ request('search') }}" />
                </div>
            </form>

            <!-- Add User -->
            <a href="{{ url('registration') }}"
                class="inline-flex items-center gap-2 px-4 py-2 bg-[#323B76] hover:bg-[#444d90] text-white text-sm font-medium rounded-lg shadow-md transition duration-200">
                <svg fill="#ffffff" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 612 612">
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
                <span>Add User</span>
            </a>
        </div>
    </div>


    <!-- 🔽 This is the line added below the head section -->
    <div class="border-b border-gray-400 mb-5"></div>

    <!-- Container for cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($users as $user)
        @php 
            $dropdownId = 'dropdown' . $user->id; 
            $buttonId = 'dropdownButton' . $user->id; 
        @endphp

        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                        <div class="flex justify-end px-4 pt-4 relative">
                <button id="{{ $buttonId }}" data-dropdown-toggle="{{ $dropdownId }}" class="p-2 rounded-full bg-gray-100 hover:bg-gray-200">
                    <svg class="w-4 h-4 text-gray-600" fill="currentColor" viewBox="0 0 16 3">
                        <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                    </svg>
                </button>
                <div id="{{ $dropdownId }}" class="hidden absolute right-2 top-10 z-20 text-sm list-none bg-white border border-gray-300 rounded-lg shadow w-36">
                    <ul class="py-2">
                        <li>
                            <a href="{{ route('admin.user_update', ['id' => $user->id]) }}" class="block px-4 py-2 hover:bg-gray-100 text-gray-700">Edit</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="flex flex-col items-center pb-6">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg object-cover" src="{{ $user->photo_url }}" alt="{{ $user->first_name }} {{ $user->last_name }}">
                <h5 class="mb-1 text-lg font-semibold text-gray-900">{{ $user->first_name }} {{ $user->last_name }}</h5>
                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded mb-1">{{ $user->role_name }}</span>
                <!-- Optional static department -->
                <div class="text-sm text-gray-500 mb-4">Production Department</div>

             <div class="w-full px-6 text-left text-sm text-gray-700 space-y-1">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2C6.134 2 3 5.134 3 9c0 3.866 4.403 8.535 6.693 10.648a1 1 0 001.614 0C12.597 17.535 17 12.866 17 9c0-3.866-3.134-7-7-7zm0 10.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ $user->employee_number ?? 'Location Unknown' }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016.528 4H3.472a2 2 0 00-1.469 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        <span>{{ $user->email }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 4.5A2.5 2.5 0 014.5 2h1A1.5 1.5 0 017 3.5V4a1 1 0 01-1 1H5.414l.293.293a12.044 12.044 0 004.243 2.828L10 8h1a1 1 0 011 1v1a1.5 1.5 0 01-1.5 1h-.5a1 1 0 01-1-.707L8.586 9.414a14.044 14.044 0 01-3.535-3.535L4 5.414V6a1 1 0 01-1 1h-.5A1.5 1.5 0 011 5.5v-1z"/>
                        </svg>
                        <span>{{ $user->phone_number }}</span>
                    </div>
                </div>
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

@endsection