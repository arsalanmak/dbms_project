<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-yellow-500">
    <div>
        {{-- @dump($logo) --}}
        <img src="{{ asset('images/logo.svg') }}" width="100px">
        <h1>Rent a Car</h1>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>