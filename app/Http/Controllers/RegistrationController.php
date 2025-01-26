<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        if (Auth::user()->is_admin) {
            $peminjamans = Peminjaman::with('user')->paginate(10);
        } else {
            $peminjamans = Peminjaman::where('user_id', Auth::id())->paginate(10);
        }
        return view('registrations.index', compact('peminjamans'));
    }

    public function create()
    {
        $user = auth()->user();
        $books = Book::where('jumlah', '>', 0)->get();
        return view('registrations.create', compact('user', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_telepon' => 'required|numeric|max_digits:13',
            'alamat' => 'required|string',
            'book_id' => 'required|integer|exists:books,id',
        ]);

        $user = auth()->user();
        $book = Book::findOrFail($request->book_id);

        if (!$book || $book->jumlah <= 0) {
            return redirect()->back()->with('error', 'Buku tidak tersedia untuk dipinjam.');
        }

        $book->decrement('jumlah');

        $peminjaman = Peminjaman::create([
            'user_id' => $user->id,
            'book_id' => $request->book_id,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'tanggal_pinjam' => now(),
            'tanggal_kembali' => now()->addDays(7),
            'status' => false
        ]);

        return redirect()->route('registrations.index')->with('success', 'Peminjaman berhasil dilakukan.');
    }

    public function updateStatus(Peminjaman $peminjaman)
    {
        if (!$peminjaman->status) { // Jika status masih 0 (dipinjam)
            $peminjaman->update(['status' => true]); // Ubah status menjadi dikembalikan
            $peminjaman->book->increment('jumlah'); // Tambahkan jumlah buku
            return redirect()->route('registrations.index')->with('success', 'Peminjaman berhasil dikembalikan.');
        }

        return redirect()->route('registrations.index')->with('error', 'Peminjaman sudah dikembalikan sebelumnya.');
    }

    public function cetak($id)
    {
        $peminjaman = Peminjaman::with(['user', 'book'])->findOrFail($id);

        $pdf = PDF::loadView('registrations.cetak', [
            'peminjaman' => $peminjaman,
            'user' => $peminjaman->user
        ]);

        return $pdf->download('karturegistrasi.pdf');
    }
}
