<div class="h-screen mx-4 pt-6 sm:pt-0 relative grid place-items-center">
    <div>
        <img src="{{ asset('images/logo-pelindo.png') }}" alt="Pelindo Logo">
    </div>
    <div class="w-full sm:max-w-md -mt-56 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden rounded-lg">
        {{ $slot }}
    </div>
</div>
