<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Perpustakaan</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            .background {
                background-image: url("{{ asset('perpus.png') }}");
                background-size: cover;
                background-position: center;
            }
        </style>
    </head>
    <body class="min-h-screen bg-gray-200">
        <div class="relative bg-cover bg-center h-screen background">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="relative z-10 flex justify-center items-center h-full">
                <div class="text-center text-white px-6 py-4">
                    <h1 class="text-4xl font-bold mb-4">Selamat Datang di Perpustakaan</h1>
                    <p class="text-lg mb-6">Akses Buku Digital, Daftar Sekarang atau Masuk untuk Melanjutkan</p>

                    <div class="flex justify-center gap-4">
                        <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-200">Login</a>
                        <a href="{{ route('register') }}" class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-200">Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
