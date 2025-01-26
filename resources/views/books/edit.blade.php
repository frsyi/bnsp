<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="post" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <x-input-label for="kode_buku" :value="__('Kode Buku')" />
                            <x-text-input id="kode_buku" name="kode_buku" type="text" class="block w-full mt-1"
                                :value="old('kode_buku', $book->kode_buku)" required autofocus autocomplete="kode_buku" />
                            <x-input-error class="mt-2" :messages="$errors->get('kode_buku')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="judul" :value="__('Judul')" />
                            <x-text-input id="judul" name="judul" type="text" class="block w-full mt-1"
                                :value="old('judul', $book->judul)" required autofocus autocomplete="judul" />
                            <x-input-error class="mt-2" :messages="$errors->get('judul')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="penulis" :value="__('Penulis')" />
                            <x-text-input id="penulis" name="penulis" type="text" class="block w-full mt-1"
                                :value="old('penulis', $book->penulis)" required autofocus autocomplete="penulis" />
                            <x-input-error class="mt-2" :messages="$errors->get('penulis')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="penerbit" :value="__('Penerbit')" />
                            <x-text-input id="penerbit" name="penerbit" type="text" class="block w-full mt-1"
                                :value="old('penerbit', $book->penerbit)" required autofocus autocomplete="penerbit" />
                            <x-input-error class="mt-2" :messages="$errors->get('penerbit')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="tahun_terbit" :value="__('Tahun Terbit')" />
                            <x-text-input id="tahun_terbit" name="tahun_terbit" type="number" min="1000" max="9999" class="block w-full mt-1"
                                :value="old('tahun_terbit', $book->tahun_terbit)" required autofocus autocomplete="tahun_terbit" />
                            <x-input-error class="mt-2" :messages="$errors->get('tahun_terbit')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="jumlah" :value="__('Jumlah')" />
                            <x-text-input id="jumlah" name="jumlah" type="number" class="block w-full mt-1"
                                :value="old('jumlah', $book->jumlah)" required autofocus autocomplete="jumlah" />
                            <x-input-error class="mt-2" :messages="$errors->get('jumlah')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Update') }}</x-primary-button>
                            <a href="{{ route('books.index') }}"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-500 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
