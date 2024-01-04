<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('user_1177568.png') }}" type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    <script>
        if (localStorage.getItem("dark-mode") === "false" || !("dark-mode" in localStorage)) {
            document.documentElement.style.colorScheme = "light";
            document.documentElement.setAttribute("data-theme", "light");
            document.documentElement.classList.remove("dark");
        } else {
            document.documentElement.style.colorScheme = "dark";
            document.documentElement.setAttribute("data-theme", "dark");
            document.documentElement.classList.add("dark");
        }
    </script>
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-slate-500 overflow-hidden">
    <x-banner />

    <div class="min-h-screen relative">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        {{-- @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

        {{-- <div class="flex">
                <!-- Sidebar -->
                <x-sidebar></x-sidebar>
    
                <!-- Page Content -->
                <main class="max-w-7xl w-full mx-auto">
                    {{ $slot }}
                </main>
            </div> --}}

        <div class="flex overflow-hidden">
            <x-sidebar></x-sidebar>

            <main class="w-full mx-auto max-w-7xl px-4">
                @if (session()->has('message'))
                    <div class="alert alert-{{ session()->get('alert-type') }} mb-4 bg-{{ session()->get('color') }}-800"
                        x-init="setTimeout(() => { document.querySelector('.alert').remove() }, 5000)">
                        {!! session()->get('icon') !!}
                        <strong>{{ session()->get('message') }}</strong>
                    </div>
                @endif

                <div class="overflow-auto h-[calc(100vh-6rem)] pr-2">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    @stack('modals')

    @livewireScripts

</body>

</html>
