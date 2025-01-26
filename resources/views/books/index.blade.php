<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-xl text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        @can('admin')
                        <div>
                            <x-create-button href="{{ route('books.create') }}" />
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

                <div class="p-6">
                    <!-- Search and Filter Form -->
                    <form method="GET" action="{{ route('books.index') }}">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                            <div>
                                <input type="text" name="search" value="{{ request('search') }}"
                                       placeholder="Cari berdasarkan judul, penulis, atau penerbit"
                                       class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200">
                            </div>
                            <div>
                                <input type="number" name="tahun_terbit" value="{{ request('tahun_terbit') }}"
                                    placeholder="Cari berdasarkan tahun terbit"
                                    class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200">
                            </div>
                            <div>
                                <button type="submit" class="w-full px-4 py-2 text-white bg-gray-800 rounded-lg dark:bg-blue-600 hover:bg-gray-700">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Kode Buku</th>
                                <th scope="col" class="px-6 py-3">Judul</th>
                                <th scope="col" class="px-6 py-3">Penulis</th>
                                <th scope="col" class="px-6 py-3">Penerbit</th>
                                <th scope="col" class="px-6 py-3">Tahun Terbit</th>
                                <th scope="col" class="px-6 py-3">Stok</th>
                                @can('admin')
                                <th scope="col" class="px-6 py-3">Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($books as $book)
                                <tr class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-50 even:dark:bg-gray-700">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $book->kode_buku }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $book->judul }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $book->penulis }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $book->penerbit }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $book->tahun_terbit }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $book->jumlah > 0 ? $book->jumlah : 'Sedang tidak tersedia' }}
                                    </td>
                                    @can('admin')
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-3">
                                            <a href="{{ route('books.edit', $book->id) }}" class="text-blue-600 dark:text-blue-400">
                                                <x-heroicon-o-pencil-square class="w-6 h-6"/>
                                            </a>
                                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="text-red-600 dark:text-red-400 delete-button">
                                                    <x-heroicon-o-trash class="w-6 h-6"/>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    @endcan
                                </tr>
                            @empty
                                <tr class="bg-white dark:bg-gray-800">
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-900 dark:text-white">
                                        Buku tidak ditemukan
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="flex justify-center mt-4 mb-4">
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
</head>
<body>
    <div class="container">
        <h2>Data Buku Datatable</h2>
        @if (Session::has('pesan'))
            <div class="alert alert-success">
                {{ Session::get('pesan') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <a href="{{ route('books.create') }}" class="mb-3 btn btn-primary float-end">Tambah Buku</a>
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th width="1">ID</th>
                            <th>Penulis</th>
                            <th>Judul</th>
                            <th>Publisher Date</th>
                            <th width="1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->author->nama }}</td>
                            <td>{{ $book->judul }}</td>
                            <td>{{ $book->published_date }}</td>
                            <td>
                                <div class="gap-2 d-flex">
                                    <a href={{ route('books.edit', $book -> id) }} class="btn btn-warning btn-sm">Edit</a>
                                    <div>
                                        <form action="{{ route('books.destroy', $book -> id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Yakin mau dihapus?')"
                                            type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('authors.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
    <script>
        new DataTable('.datatable'); // menggunakan class
    </script>
</body>
</html> --}}
