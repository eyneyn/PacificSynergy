    @if(session('error'))
    <div class="flex justify-center mt-4">
        <div class="bg-red-50 text-red-400 w-full max-w-md border border-red-300 text-sm p-3 flex items-center justify-center text-center gap-2 shadow-sm" role="alert">
            <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
                {{ session('error') }}
        </div>
    </div>
    @endif

    @if(session('success'))
    <div class="flex justify-center mt-4">
        <div class="w-full max-w-md border text-sm p-3 flex items-center justify-center text-center gap-2 text-green-800 bg-green-100 border border-green-300 shadow-sm">
            <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            {{ session('success') }}
        </div>
    </div>
    @endif

    