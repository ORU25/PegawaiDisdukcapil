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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-200">
            <div>
                {{-- <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a> --}}
                <div>
                    <h1 class=" text-center mb-2 text-4xl font-extrabold leading-none tracking-tight text-cyan-700 md:text-5xl lg:text-6xl ">SIKP</h1>
                </div>
                <div>
                    <h1 class=" text-center  text-lg font-normal text-gray-600 lg:text-xl sm:px-16 xl:px-48 ">Sistem Informasi KePegawaian</h1>
                </div>
            </div>

            <div class="w-3/4 sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden rounded-lg ">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
