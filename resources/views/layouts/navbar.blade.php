<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])    
    </head>

    <body class="font-sans" style="font-family: 'Inter', sans-serif;">
         <!-- Hamburger Button (Mobile & Tablet) -->
         <button id="sidebar-toggle" class="lg:hidden fixed top-4 left-4 z-50 text-white bg-[#1B224F] p-2 rounded-md focus:outline-none">
            <!-- Hamburger Icon -->
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
               xmlns="http://www.w3.org/2000/svg">
               <path stroke-linecap="round" stroke-linejoin="round"
                     d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
         </button>
         <!-- Sidebar -->
         <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen py-5 px-3 transition-transform -translate-x-full lg:translate-x-0 bg-[#1B224F] border-r border-[#1B224F]" aria-label="Sidebar">
            <div class="h-full overflow-y-auto">
         <div class="flex justify-between items-center px-2 mb-6 mt-5">
            <span class="font-semibold sm:text-xl text-white">Pacific Synergy</span>
            <!-- Close Button -->
            <button id="sidebar-close" class="lg:hidden text-white p-1 rounded-md hover:bg-[#2a315f] hidden">
               <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12"/>
               </svg>
            </button>
         </div>

            <ul class="space-y-2 font-medium">
               {{-- Admin Section --}}
               @if(Auth::user()->role_name === 'admin')
                  @include('components.sidebar.admin')
                  @include('components.sidebar.manager')
               @endif

               {{-- Production Section --}}
               @if(Auth::user()->role_name === 'manager')
                  @include('components.sidebar.manager')
               @endif

               {{-- Senior Section --}}
               @if(Auth::user()->role_name === 'senior')
                  @include('components.sidebar.senior')
               @endif

               <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                  <li>
                     <a href="{{ url('logout')}}" class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                        <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                           <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                           <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                           <g id="SVGRepo_iconCarrier">
                             <path d="M17.2929 14.2929C16.9024 14.6834 16.9024 15.3166 17.2929 15.7071C17.6834 16.0976 18.3166 16.0976 18.7071 15.7071L21.6201 12.7941C21.6351 12.7791 21.6497 12.7637 21.6637 12.748C21.87 12.5648 22 12.2976 22 12C22 11.7024 21.87 11.4352 21.6637 11.252C21.6497 11.2363 21.6351 11.2209 21.6201 11.2059L18.7071 8.29289C18.3166 7.90237 17.6834 7.90237 17.2929 8.29289C16.9024 8.68342 16.9024 9.31658 17.2929 9.70711L18.5858 11H13C12.4477 11 12 11.4477 12 12C12 12.5523 12.4477 13 13 13H18.5858L17.2929 14.2929Z" fill="currentColor"></path>
                             <path d="M5 2C3.34315 2 2 3.34315 2 5V19C2 20.6569 3.34315 22 5 22H14.5C15.8807 22 17 20.8807 17 19.5V16.7326C16.8519 16.647 16.7125 16.5409 16.5858 16.4142C15.9314 15.7598 15.8253 14.7649 16.2674 14H13C11.8954 14 11 13.1046 11 12C11 10.8954 11.8954 10 13 10H16.2674C15.8253 9.23514 15.9314 8.24015 16.5858 7.58579C16.7125 7.4591 16.8519 7.35296 17 7.26738V4.5C17 3.11929 15.8807 2 14.5 2H5Z" fill="currentColor"></path>
                           </g>
                         </svg>
                        <span class="ms-3">Logout</span>
                     </a>
                  </li>
               </ul>
            </ul>
         </div>
      </aside>

      <!-- Top Navigation -->
      <nav class="fixed top-0 left-0 right-0 z-30 lg:ml-64 bg-white flex items-center justify-between px-6 py-3 shadow-md">
         <div>
            <h1 class="text-lg lg:text-xl font-semibold text-gray-800">Good Morning</h1>
            <p class="text-sm text-gray-500">Hi, Barly Vallendito. Welcome Back.</p>
         </div>
         <div class="flex items-center space-x-4">
            <!-- Notification -->
            <button class="p-3 bg-transparent border border-[#5D67A1] rounded-md hover:bg-[#dae2ff] transition">
               <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
                  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 00-4 0v.341C8.67 6.165 8 7.388 8 8.75v5.408c0 .538-.214 1.055-.595 1.437L6 17h5m2 0v1a2 2 0 11-4 0v-1m4 0H9" />
               </svg>
            </button>
            <!-- User Avatar -->
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="w-8 h-8 rounded-full">
         </div>
      </nav>

      <div class="p-5 lg:ml-64">
         <div class="p-5 mt-16">
            @yield('content')
            
         </div>
      </div>         
      <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    </body>
</html>
