<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pacific Synergy</title>
    <meta name="description" content="Pacific Synergy Overview">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])    
</head>

<body class="min-h-screen flex items-center justify-center bg-cover bg-center" style="background-image: linear-gradient(rgba(9, 69, 89, 0.962), rgba(5, 58, 86, 0.671)), url('{{ asset('img/cover.png') }}')">
  <div class="w-full max-w-md bg-white/10 backdrop-blur-md border border-white/30 shadow-md rounded-xl p-8 text-white">
  
    <img src="img/logo.png" alt="Logo" class="mx-auto h-25 mb-4" />
    <h1 class="text-center text-xl font-light">Pacific Synergy Food and Beverage Corp.</h1>
    <h2 class="text-center text-2xl font-semibold mt-2">Login</h2>

  @include('layouts._message')


    <form method="POST" action="{{ route("login_post")}}" class="mt-6 space-y-4">
        @csrf

        <!-- Email -->
        <div class="relative">
          <input type="email" value="{{ old('email')}}" id="email" name="email" placeholder="Email" @error('email' ) is-invalid @enderror placeholder="name@flowbite.com" autofocus required class="w-full rounded-full bg-transparent border border-white/30 px-5 py-3 pr-12 text-white placeholder-white/80 focus:ring-2 focus:ring-white/50 focus:outline-none" />
            <div class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white">
              <!-- User Icon -->
              <svg class="w-7 h-7" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M3.75 5.25L3 6V18L3.75 18.75H20.25L21 18V6L20.25 5.25H3.75ZM4.5 7.6955V17.25H19.5V7.69525L11.9999 14.5136L4.5 7.6955ZM18.3099 6.75H5.68986L11.9999 12.4864L18.3099 6.75Z"/>
              </svg>
            </div>

          {{-- <input type="text" value="{{ old('email')}}" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" @error('email' ) is-invalid @enderror placeholder="name@flowbite.com" autofocus /> --}}
        </div>

        <!-- Password -->
        <div class="relative">
            <input type="password" id="password" name="password" placeholder="Password" class="w-full rounded-full bg-transparent border border-white/30 px-5 py-3 pr-12 text-white placeholder-white/80 focus:ring-2 focus:ring-white/50 focus:outline-none" required/>
            <div class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white">
              <!-- Lock Icon -->
                <svg class="w-6 h-6" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.5 8.5V7.5C12.5 6.94772 12.0523 6.5 11.5 6.5H1.5C0.947715 6.5 0.5 6.94772 0.5 7.5V13.5C0.5 14.0523 0.947715 14.5 1.5 14.5H11.5C12.0523 14.5 12.5 14.0523 12.5 13.5V12.5M12.5 8.5H8.5C7.39543 8.5 6.5 9.39543 6.5 10.5C6.5 11.6046 7.39543 12.5 8.5 12.5H12.5M12.5 8.5C13.6046 8.5 14.5 9.39543 14.5 10.5C14.5 11.6046 13.6046 12.5 12.5 12.5M3.5 6.5V3.5C3.5 1.84315 4.84315 0.5 6.5 0.5C8.15685 0.5 9.5 1.84315 9.5 3.5V6.5M12 10.5H13M10 10.5H11M8 10.5H9" stroke="white" />
                </svg>
            </div>
        </div>

        <div class="text-center mt-2">
          <a href="{{url ('forgot')}}" class="text-ml text-white/80 hover:text-white transition duration-200">Forgot Password?</a>
        </div>

        <!-- Login Button -->
        <button type="submit" class="mt-5 w-1/2 mx-auto block py-3 bg-white text-[#0F1C39] rounded-full font-semibold shadow-md hover:bg-[#0F1C39] hover:text-white transition-all transform hover:scale-105 active:scale-95"> Login </button>
    </form>
  </div>
  
</body>

@section('head')
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, post-check=0, pre-check=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
@endsection