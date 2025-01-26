<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Tambah Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <x-input-label for="kode_buku" :value="__('Kode Buku')" />
                            <x-text-input id="kode_buku" name="kode_buku" type="text" class="block w-full mt-1"
                                :value="old('kode_buku')" required autofocus autocomplete="kode_buku" />
                            <x-input-error class="mt-2" :messages="$errors->get('kode_buku')" />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="judul" :value="__('Judul')" />
                            <x-text-input id="judul" name="judul" type="text" class="block w-full mt-1"
                                :value="old('judul')" required autofocus autocomplete="judul" />
                            <x-input-error class="mt-2" :messages="$errors->get('judul')" />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="penulis" :value="__('Penulis')" />
                            <x-text-input id="penulis" name="penulis" type="text" class="block w-full mt-1"
                                :value="old('penulis')" required autofocus autocomplete="penulis" />
                            <x-input-error class="mt-2" :messages="$errors->get('penulis')" />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="penerbit" :value="__('Penerbit')" />
                            <x-text-input id="penerbit" name="penerbit" type="text" class="block w-full mt-1"
                                :value="old('penerbit')" required autofocus autocomplete="penerbit" />
                            <x-input-error class="mt-2" :messages="$errors->get('penerbit')" />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="tahun_terbit" :value="__('Tahun Terbit')" />
                            <x-text-input id="tahun_terbit" name="tahun_terbit" type="number" min="1000" max="9999" class="block w-full mt-1"
                                :value="old('tahun_terbit')" required autofocus autocomplete="tahun_terbit" />
                            <x-input-error class="mt-2" :messages="$errors->get('tahun_terbit')" />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="jumlah" :value="__('Jumlah')" />
                            <x-text-input id="jumlah" name="jumlah" type="number" class="block w-full mt-1"
                                :value="old('jumlah')" required autofocus autocomplete="jumlah" />
                            <x-input-error class="mt-2" :messages="$errors->get('jumlah')" />
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
</x-app-layout>



{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
</head>
<body>
    <div class="container">
        <h1>Tambah Buku</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Penulis</label>
                <select class="form-control" name="author_id" required>
                    <option value="">Pilih Penulis</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" required>
            </div>
            <div class="form-group">
                <label>Published Date</label>
                <input type="date" class="form-control" name="published_date" required>
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
</body>
</html> --}}
