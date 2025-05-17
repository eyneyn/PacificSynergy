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
              <a href="" class="disabled-link ms-1 text-xs font-medium text-blue-800 hover:text-blue-600 md:ms-2">Edit user information</a>
          </div>
        </li>
    </ol>
    </nav>

    <form id="update-form" method="POST" action="{{route('admin.user_update', ['id' => $user->id])}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start mt-13 mb-10">
        {{-- Profile Card (Left Panel) --}}
        <div class="bg-white p-6 flex flex-col items-center text-center bg-white border border-gray-200 rounded-sm shadow-lg mb-10 transition-all duration-300 hover:shadow-xl">
                <div class="relative w-32 h-32 mb-4">
                    <img src="{{ $user->photo_url }}" alt="{{ $user->first_name }} {{ $user->last_name }}"
                        class="w-full h-full object-cover rounded-full border border-gray-300">
                    
                    <!-- Label to trigger file input -->
                    <label for="photo" class="absolute bottom-2 right-2 bg-white p-1 rounded-full shadow-md cursor-pointer hover:bg-gray-100">
                        <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.25 2.25 0 113.182 3.182L6.75 20.25H3v-3.75L16.732 3.732z"/>
                        </svg>
                    </label>

                    <!-- File input -->
                    <input type="file" name="photo" id="photo" accept="image/*" class="hidden" onchange="this.form.submit()" />
                </div>

                <h2 class="text-lg font-semibold text-gray-900">{{ $user->first_name }} {{ $user->last_name }}</h2>
                <p class="text-sm text-gray-600 mt-1">{{ $user->department }}</p>
                <p class="text-sm text-gray-500">{{ $user->email }}</p>

                @error('photo')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

    <div class="bg-white lg:col-span-2 p-6 space-y-8 bg-white border border-gray-200 rounded-sm shadow-lg mb-10 transition-all duration-300 hover:shadow-xl">
        {{-- Profile Info --}}
        <div class="space-y-4">
            <h3 class="text-xl font-medium text-blue-950">User Information</h3>

            <!-- Row 1: Last name - First Name - Photo Upload-->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Last Name -->
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-blue-950">Last Name</label>
                    <input type="text" name="last_name" value="{{$user->last_name}}" class="bg-transparent border border-[#0F1C39] text-blue-950 text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5" autofocus/>
                    @error('last_name')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <!-- First Name -->
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-blue-950">First Name</label>
                    <input type="text" name="first_name" value="{{$user->first_name}}" class="bg-transparent border border-[#0F1C39] text-blue-950 text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5"/>
                    @error('first_name')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Row 2: Employee Number - Position - Department -->
                <!-- Employee Number -->
                <div>
                    <label for="employee_number" class="block mb-2 text-sm font-medium text-blue-950">Employee Number</label>
                    <input type="text" name="employee_number" value="{{$user->employee_number}}" class="bg-transparent border border-[#0F1C39] text-blue-950 text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5"/>
                    @error('employee_number')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Position -->
                <div>
                    <label for="is_role" class="block mb-2 text-sm font-medium text-blue-950">Position</label>
                    <select name="is_role" class="bg-transparent border border-[#0F1C39] text-blue-950 text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5">
                        <option value="3" {{ $user->is_role == 3 ? 'selected' : '' }}>Admin</option>
                        <option value="2" {{ $user->is_role == 2 ? 'selected' : '' }}>Manager</option>
                        <option value="1" {{ $user->is_role == 1 ? 'selected' : '' }}>Analyst</option>
                        <option value="0" {{ $user->is_role == 0 ? 'selected' : '' }}>Senior</option>
                    </select>
                </div>
                <!-- Phone Number -->
                <div>
                    <label for="phone_number" class="block mb-2 text-sm font-medium text-blue-950">Phone Number</label>
                    <input type="text" name="phone_number" value="{{$user->phone_number}}"  class="bg-transparent border border-[#0F1C39] text-blue-950 text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5"/>
                    @error('phone_number')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        <!-- Email and Password-->
        <div class="space-y-4">
            <div>
                <h3 class="text-lg font-semibold text-blue-950 flex items-center mt-10 gap-3">
                    <svg class="w-6 h-6 text-blue-950" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 10.5V6a4.5 4.5 0 00-9 0v4.5M4.5 10.5A1.5 1.5 0 006 12v6a1.5 1.5 0 001.5 1.5h9A1.5 1.5 0 0018 18v-6a1.5 1.5 0 00-1.5-1.5h-12z" />
                    </svg>
                    Account Security
                </h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Email -->
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-blue-950">Email</label>
                    <input type="text" name="email" value="{{ $user->email }}" class="bg-transparent border border-[#0F1C39] text-blue-950 text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5" autofocus/>
                    @error('email')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div></div>
                <div>
                </div>
            </div>

        @include('layouts._message')

            <!-- Submit button -->
            <div class="md:col-span-3 flex justify-end">
                <button type="button" data-modal-target="confirm-update-modal" data-modal-toggle="confirm-update-modal" class="text-white bg-[#0F1C39] hover:bg-[#0d1730] focus:ring-4 focus:outline-none focus:ring-[#0F1C39]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full md:w-auto">
                    {{ __('Update') }}
                </button>
            </div>

            <!-- Modal -->
            <div id="confirm-update-modal" tabindex="-1"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full flex">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="confirm-update-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>

                        <div class="p-6 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" fill="none"
                                stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v2m0 4h.01M4.929 4.929a10 10 0 1014.142 0 10 10 0 00-14.142 0z"></path>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                Are you sure you want to update the form?
                            </h3>
                            <button type="button" onclick="document.getElementById('update-form').submit();"
                                class="text-white bg-[#0F1C39] hover:bg-[#0d1730] focus:ring-4 focus:outline-none focus:ring-[#0F1C39]/50 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Yes, update
                            </button>
                            <button data-modal-hide="confirm-update-modal" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div>
@endsection