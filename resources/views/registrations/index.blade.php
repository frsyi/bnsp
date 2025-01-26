<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Registrasi Peminjaman Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-xl text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        @can('peminjam')
                        <div>
                            <x-create-button href="{{ route('registrations.create') }}" />
                        </div>
                        @endcan
                        <div>
                            @if (session('success'))
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                                    class="text-sm text-green-600 dark:text-green-400">{{ session('success') }}
                                </p>
                            @endif
                            @if (session('danger'))
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                                    class="text-sm text-red-600 dark:text-red-400">{{ session('danger') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">Nama Peminjam</th>
                                <th scope="col" class="px-6 py-3">No Telepon</th>
                                <th scope="col" class="px-6 py-3">Alamat</th>
                                <th scope="col" class="px-6 py-3">Judul Buku</th>
                                <th scope="col" class="px-6 py-3">Tanggal Pinjam</th>
                                <th scope="col" class="px-6 py-3">Tanggal Kembali</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700">
                            @php $no = 1; @endphp
                            @forelse ($peminjamans as $peminjaman)
                            <tr class="bg-white cursor-pointer dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $no++ }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $peminjaman->user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $peminjaman->no_telepon }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $peminjaman->alamat }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $peminjaman->book->judul }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d-m-Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $peminjaman->tanggal_kembali ? \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('d-m-Y') : 'Belum Kembali' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('registrations.cetak', $peminjaman->id) }}"
                                       class="text-blue-600 dark:text-blue-500 hover:underline">
                                        Cetak Kartu
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($peminjaman->status)
                                        <span class="text-green-600 dark:text-green-400">Dikembalikan</span>
                                    @else
                                        @can('admin')
                                            <form action="{{ route('registrations.update-status', $peminjaman->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-orange-500 dark:text-orange-400 hover:underline focus:outline-none">
                                                    Dipinjam
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-gray-500">Dipinjam</span>
                                        @endcan
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr class="bg-white dark:bg-gray-800">
                                <td colspan="8" class="px-6 py-4 text-center whitespace-nowrap">Data peminjaman tidak ditemukan</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="flex justify-center mt-4 mb-4">
                        {{ $peminjamans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
