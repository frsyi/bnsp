<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Registrasi peminjaman Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="post" action="{{ route('registrations.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <x-input-label for="nama" :value="__('Nama')" />
                            <x-text-input id="nama" name="nama" type="text" class="block w-full mt-1"
                                :value="old('nama', $user->name)" required autofocus autocomplete="nama" />
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="block w-full mt-1"
                                :value="old('email', $user->email)" required autofocus autocomplete="email" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="no_telepon" :value="__('No Telepon')" />
                            <x-text-input id="no_telepon" name="no_telepon" type="text" class="block w-full mt-1"
                                :value="old('no_telepon')" required autofocus autocomplete="no_telepon" />
                            <x-input-error class="mt-2" :messages="$errors->get('no_telepon')" />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="alamat" :value="__('Alamat')" />
                            <x-text-input id="alamat" name="alamat" type="text" class="block w-full mt-1"
                                :value="old('alamat')" required autofocus autocomplete="alamat" />
                            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="book_id" :value="__('Buku yang Dipinjam')" />
                            <x-select id="book_id" name="book_id" class="block w-full mt-1">
                                <option value="">Pilih Buku</option>
                                @forelse ($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->judul }} ({{ $book->jumlah }} tersedia)</option>
                                @empty
                                    <option disabled>Tidak ada buku yang tersedia</option>
                                @endforelse
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('book_id')" />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="tanggal_pinjam" :value="__('Tanggal Pinjam')" />
                            <x-text-input id="tanggal_pinjam" name="tanggal_pinjam" type="date" class="block w-full mt-1"
                                :value="old('tanggal_pinjam', \Carbon\Carbon::now()->format('Y-m-d'))" disabled />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="tanggal_kembali" :value="__('Tanggal Kembali')" />
                            <x-text-input id="tanggal_kembali" name="tanggal_kembali" type="date" class="block w-full mt-1"
                                :value="old('tanggal_kembali', \Carbon\Carbon::now()->addDays(7)->format('Y-m-d'))" disabled />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            <a href="{{ route('books.index') }}"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-500 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#book_id').select2();
        });
    </script>
</x-app-layout>




{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Peminjaman Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
</head>
<body>
    <div class="container">
        <h1>Registrasi Peminjaman Buku</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('registrations.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="mb-3 form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3 form-group">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" required>
            </div>
            <div class="mb-3 form-group">
                <label>Nomor Telp</label>
                <input type="text" class="form-control" name="no_telepon" required>
            </div>
            <div class="mb-3 form-group">
                <label for="agama_id">Agama</label>
                <select id="agama_id" name="agama_id" class="form-control" required>
                    @foreach($agama as $d)
                    <option value="{{ $d->id }}">{{ $d->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" required></textarea>
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script>
        $( '#agama_id' ).select2( {
            theme: 'bootstrap-5'
        } );
    </script>
</body>
</html> --}}
