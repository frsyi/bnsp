<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Book::query();

        // Pencarian berdasarkan judul, penulis, dan penerbit
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                    ->orWhere('penulis', 'like', '%' . $request->search . '%')
                    ->orWhere('penerbit', 'like', '%' . $request->search . '%');
            });
        }

        // Filter berdasarkan tahun terbit
        if ($request->filled('tahun_terbit')) {
            $query->where('tahun_terbit', $request->tahun_terbit);
        }

        $books = $query->paginate(10);

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_buku' => 'required|string|unique:books',
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'tahun_terbit' => 'required|integer|digits:4|min:1901|max:2155',
            'jumlah' => 'required|integer',
        ], [
            'kode_buku.unique' => 'Kode buku telah digunakan.',
            'tahun_terbit.digits' => 'Tahun terbit harus terdiri dari 4 angka.',
        ]);

        Book::create($validated);

        return redirect('/books')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::with('author')->findOrFail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode_buku' => 'required|string|unique:books',
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'tahun_terbit' => 'required|integer|digits:4|min:1901|max:2155',
            'jumlah' => 'required|integer',
        ], [
            'kode_buku.unique' => 'Kode buku telah digunakan.',
            'tahun_terbit.digits' => 'Tahun terbit harus terdiri dari 4 angka.',
        ]);

        $book = Book::findOrFail($id);
        $book->update($validated);

        return redirect('/books')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect('/books')->with('success', 'Data berhasil dihapus');
    }
}
