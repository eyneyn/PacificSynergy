    @if(session('error'))
    <div class="mt-4 text-center text-sm text-red-600 bg-red-100 border border-red-300 px-4 py-3 rounded-md">
        {{ session('error') }}
    </div>
    @endif

    @if(session('success'))
        <div class="mt-4 text-center text-sm text-green-600 bg-green-100 border border-green-300 px-4 py-3 rounded-md">
            {{ session('success') }}
        </div>
    @endif