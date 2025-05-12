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
    <h2 class="text-center text-2xl font-semibold mt-2">Forgot password</h2>

  @include('layouts._message')


    <form method="POST" action="{{ url("forgot_post")}}" class="mt-6 space-y-4">
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
        </div>

        <!-- Button -->
        <button type="submit" class="mt-10 w-1/2 mx-auto block py-3 bg-white text-[#0F1C39] rounded-full font-semibold shadow-md hover:bg-[#0F1C39] hover:text-white transition-all transform hover:scale-105 active:scale-95"> Forgot Password </button>
        
        <!-- Login -->
        <div class="mt-2 text-center">
            <a href="{{ url('login') }}" class="text-primary-600 hover:text-primary-800 font-medium transition duration-150 ease-in-out underline">
                    Login Page
            </a>
        </div>
    </form>
  </div>
  
</body>

@section('head')
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, post-check=0, pre-check=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
@endsection