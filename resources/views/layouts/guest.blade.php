<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'OXXO Al Toque') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-red-600">

            {{-- Logo OXXO --}}
            <div class="mb-2">
                <a href="/">
                    <img src="{{ asset('images/logo-oxxo.png') }}" alt="OXXO Al Toque" class="h-16">
                </a>
            </div>

            {{-- Subtítulo --}}
            <p class="text-white text-sm mb-4 tracking-wide">Sistema de Gestión OXXO Al Toque</p>

            {{-- Tarjeta blanca con el formulario --}}
            <div class="w-full sm:max-w-md px-6 py-6 bg-white shadow-lg overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>

            {{-- Enlace de regreso al inicio --}}
            <a href="/" class="mt-4 text-white text-sm underline hover:text-red-200 transition">
                ← Volver al inicio
            </a>

        </div>
    </body>
</html>
