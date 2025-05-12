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
              <a href="{{url('admin/index')}}" class="ms-1 text-sm font-medium text-blue-800 hover:text-blue-600 md:ms-2">User Management</a>
          </div>
        </li>
        <li>
          <div class="flex items-center">
              <svg class="w-3 h-3 text-blue-800 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
              </svg>
              <a href="{{ route('admin.userUpdate', ['id' => $user->id]) }}" class="ms-1 text-sm font-medium text-blue-800 hover:text-blue-600 md:ms-2">Update user information</a>
          </div>
        </li>
    </ol>
    </nav>

    <div class="w-full max-w-5xl mt-8 mx-auto bg-white/10 backdrop-blur-md border border-gray-500 rounded-md py-3 px-18">

    <form method="POST" action="{{route('admin.userUpdate', ['id' => $user->id])}}" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-3 gap-4">
    @csrf
    @method('PUT')

    @include('layouts._message')

        <!-- Header Section -->
        <div class="md:col-span-3 text-center mb-4 mt-3">
            <div class="flex items-center justify-center space-x-4">
                <!-- User Profile Icon -->
                <svg class="w-10 h-10 text-[#0F1C39]" fill="none" stroke="currentColor" stroke-width="1.5"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                
                <!-- Title and Subtext -->
                <div class="text-left">
                    <h2 class="text-lg font-semibold text-blue-950">Edit Profile</h2>
                    <p class="text-sm text-blue-950">Enter the login information for the account.</p>
                </div>
            </div>
        </div>

        <!-- Row 1: Last name - First Name - Photo Upload-->
            <!-- Last Name -->
            <div class="mb-1 col-span-1">
                <label for="last_name" class="block mb-2 text-sm font-medium text-blue-950">Last Name</label>
                <input type="text" name="last_name" value="{{$user->last_name}}" class="bg-transparent border border-[#0F1C39] text-blue-950 text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5" autofocus/>
                @error('last_name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <!-- First Name -->
            <div class="mb-1 col-span-1">
                <label for="first_name" class="block mb-2 text-sm font-medium text-blue-950">First Name</label>
                <input type="text" name="first_name" value="{{$user->first_name}}" class="bg-transparent border border-[#0F1C39] text-blue-950 text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5"/>
                @error('first_name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <!-- Photo Upload -->
            <div class="mb-1 col-span-1">
                <label class="block mb-2 text-sm font-medium text-blue-950">Upload Profile Photo</label>
                <input type="file" name="photo" accept="image/*" class="bg-transparent border border-[#0F1C39] text-blue-950 text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5" />
                @error('photo')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

        <!-- Row 2: Employee Number - Position - Department -->
            <!-- Employee Number -->
            <div class="mb-1 col-span-1">
                <label for="employee_number" class="block mb-2 text-sm font-medium text-blue-950">Employee Number</label>
                <input type="text" name="employee_number" value="{{$user->employee_number}}" class="bg-transparent border border-[#0F1C39] text-blue-950 text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5"/>
                @error('employee_number')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <!-- Position -->
            <div class="mb-4 col-span-1">
                <label for="is_role" class="block mb-2 text-sm font-medium text-blue-950">Position</label>
                <select name="is_role" class="bg-transparent border border-[#0F1C39] text-blue-950 text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5">
                    <option value="3" {{ $user->is_role == 3 ? 'selected' : '' }}>Admin</option>
                    <option value="2" {{ $user->is_role == 2 ? 'selected' : '' }}>Manager</option>
                    <option value="1" {{ $user->is_role == 1 ? 'selected' : '' }}>Analyst</option>
                    <option value="0" {{ $user->is_role == 0 ? 'selected' : '' }}>Senior</option>
                </select>
            </div>
            <!-- Department -->
            <div class="mb-4 col-span-1">
                <label for="department" class="block mb-2 text-sm font-medium text-blue-950">Department</label>
                <select name="department" class="bg-transparent border border-[#0F1C39] text-blue-950 text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5">
                    <option>{{$user->department}}</option>
                </select>
            </div>

        <!-- Row 3: Phone Number - Email -->
            <!-- Phone Number -->
            <div class="mb-1 col-span-1">
                <label for="phone_number" class="block mb-2 text-sm font-medium text-blue-950">Phone Number</label>
                <input type="text" name="phone_number" value="{{$user->phone_number}}"  class="bg-transparent border border-[#0F1C39] text-blue-950 text-sm rounded-lg focus:ring-[#0F1C39] focus:border-[#0F1C39] block w-full p-2.5"/>
                @error('phone_number')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

        <!-- Submit button -->
            <div class="md:col-span-3 flex justify-end">
                <button type="submit" class="text-white bg-[#0F1C39] hover:bg-[#0d1730] focus:ring-4 focus:outline-none focus:ring-[#0F1C39]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full md:w-auto">
                    {{ __('Update') }}
                </button>
            </div>
    </form>
    </div>
@endsection