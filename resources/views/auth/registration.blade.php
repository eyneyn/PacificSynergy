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
              <a href="" class="disabled-link ms-1 text-xs font-medium text-blue-800 hover:text-blue-600 md:ms-2">New user information</a>
          </div>
        </li>
    </ol>
    </nav>

    <div class="bg-white border border-gray-200 rounded-sm shadow-lg px-8 py-10 mt-5 mb-10 transition-all duration-300 hover:shadow-xl">
    
    @include('layouts._message')

    <form method="POST" action="{{ route('registration_post') }}" enctype="multipart/form-data" class="space-y-12">
    @csrf

        <!-- Profile Information Section -->
        <div class="space-y-6">
            <div>
                <h3 class="text-lg font-semibold text-blue-950 flex items-center gap-">
                    <svg class="w-6 h-6 text-blue-950" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    User Profile
                </h3>
                <p class="text-xs text-blue-800 mt-1">Basic details and job-related information</p>
            </div>

            <div class="grid grid-cols-1">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Last Name -->
                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium text-blue-950">Last Name</label>
                        <input type="text" name="last_name" placeholder="Dela Cruz" class="bg-transparent border border-[#0F1C39] text-blue-950 text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5" required autofocus />
                        @error('last_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- First Name -->
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-blue-950">First Name</label>
                        <input type="text" name="first_name" placeholder="Juanita" class="bg-transparent border border-[#0F1C39] text-blue-950 text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5" required />
                        @error('first_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Photo Upload -->
                    <div>
                        <label for="photo" class="block mb-2 text-sm font-medium text-blue-950">Upload Profile Photo</label>
                        <input type="file" name="photo" accept="image/*" class="bg-transparent border border-[#0F1C39] text-blue-950 cursor-pointer text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5" />
                        <p class="mt-1 text-xs text-gray-800" id="file_input_help">JPG, PNG, GIF, or SVG. Max size: 2MB.</p>
                        @error('photo')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- Employee Number, Position, Department, Phone in one row -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                    <!-- Employee Number -->
                    <div>
                        <label for="employee_number" class="block mb-2 text-sm font-medium text-blue-950">Employee Number</label>
                        <input type="text" name="employee_number" class="bg-transparent border border-[#0F1C39] text-blue-950 text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5" placeholder="PD001" required />
                        @error('employee_number')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Position -->
                    <div>
                        <label for="is_role" class="block mb-2 text-sm font-medium text-blue-950">Position</label>
                        <select name="is_role" class="bg-transparent border border-[#0F1C39] text-blue-950 text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5" required>
                            <option value="3">Admin</option>
                            <option value="2">Manager</option>
                            <option value="1">Analyst</option>
                            <option value="0">Senior</option>
                        </select>
                    </div>
                    <!-- Department -->
                    <div>
                        <label for="department" class="block mb-2 text-sm font-medium text-blue-950">Department</label>
                        <select name="department" class="bg-transparent border border-[#0F1C39] text-blue-950 text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5" required>
                            <option value="Production Department">Production Department</option>
                        </select>
                    </div>
                    <!-- Phone Number -->
                    <div>
                        <label for="phone_number" class="block mb-2 text-sm font-medium text-blue-950">Phone Number</label>
                        <input type="text" name="phone_number" class="bg-transparent border border-[#0F1C39] text-blue-950 text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5" placeholder="+63 914 0678528" />
                        @error('phone_number')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
          
        <!-- Account Security Section -->
        <div class="space-y-6 mt-10">
            <div>
                <h3 class="text-lg font-semibold text-blue-950 flex items-center gap-3">
                    <svg class="w-6 h-6 text-blue-950" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 10.5V6a4.5 4.5 0 00-9 0v4.5M4.5 10.5A1.5 1.5 0 006 12v6a1.5 1.5 0 001.5 1.5h9A1.5 1.5 0 0018 18v-6a1.5 1.5 0 00-1.5-1.5h-12z" />
                    </svg>
                    Account Security
                </h3>
                <p class="text-xs text-blue-800 mt-1">Set up secure login credentials</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Email -->
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-blue-950"> Email</label>
                    <input type="email" name="email" class="bg-transparent border border-[#0F1C39] text-blue-950 text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5" placeholder="name@example.com" required />
                    @error('email')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Password -->
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-blue-950">Password</label>
                    <input type="password" name="password" class="bg-transparent border border-[#0F1C39] text-blue-950 text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5" placeholder="Password" required />
                    @error('password')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Confirm Password -->
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-blue-950">Confirm password</label>
                    <input type="password" name="confirm_password" class="bg-transparent border border-[#0F1C39] text-blue-950 text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5" placeholder="Confirm Password" required />
                    @error('password')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

        <!-- Submit button -->
            <div class="md:col-span-3 flex justify-end">
                <button type="submit" class="cursor-pointer text-white bg-[#0F1C39] hover:bg-[#0d1730] focus:ring-4 focus:outline-none focus:ring-[#0F1C39]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full md:w-auto">
                    {{ __('Register user') }}
                </button>
            </div>
    </form>
        <script src="" async defer></script>
@endsection