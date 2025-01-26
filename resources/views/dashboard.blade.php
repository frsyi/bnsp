<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard Perpustakaan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <h3 class="mb-4 text-lg font-semibold text-gray-800 dark:text-gray-100">Selamat Datang di Perpustakaan Digital</h3>
                <p class="text-gray-600 dark:text-gray-400">Temukan buku favorit Anda dan manfaatkan layanan digital yang tersedia!</p>

                <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-3">
                    <div class="p-4 bg-blue-100 rounded-lg shadow dark:bg-blue-900">
                        <h4 class="text-lg font-semibold text-blue-800 dark:text-blue-200">Layanan yang tersedia</h4>
                        <ul class="mt-2 text-gray-700 dark:text-gray-300">
                            <li>Peminjaman Buku</li>
                            <li>Konsultasi Pustakawan</li>
                            <li>Event dan Workshop</li>
                        </ul>
                    </div>

                    <div class="p-4 bg-green-100 rounded-lg shadow dark:bg-green-900">
                        <h4 class="text-lg font-semibold text-green-800 dark:text-green-200">Fasilitas Perpustakaan</h4>
                        <ul class="mt-2 text-gray-700 dark:text-gray-300">
                            <li>Ruang baca yang nyaman</li>
                            <li>Akses internet gratis</li>
                            <li>Ruang diskusi</li>
                        </ul>
                    </div>

                    <div class="p-4 bg-yellow-100 rounded-lg shadow dark:bg-yellow-900">
                        <h4 class="text-lg font-semibold text-yellow-800 dark:text-yellow-200">Jam Operasional</h4>
                        <p class="mt-2">Senin - Jumat: 08.00 - 20.00 WIB</p>
                        <p>Sabtu - Minggu: 09.00 - 17.00 WIB</p>
                    </div>
                </div>

                <div class="p-4 mt-8 bg-gray-200 rounded-lg dark:bg-gray-700">
                    <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Event Terbaru</h4>
                    <p class="mt-2 text-gray-700 dark:text-gray-300">Jangan lewatkan event "Bedah Buku Terbaru" pada tanggal 25 Oktober 2024 di ruang auditorium!</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
