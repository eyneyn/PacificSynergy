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

        <!-- Login -->
        <div class="mt-2 text-center">
            <a href="{{ url('login') }}" class="text-primary-600 hover:text-primary-800 font-medium transition duration-150 ease-in-out underline">
                    Login
            </a>
        </div>
    </div>

</body>
</html>
