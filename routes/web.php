<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('books', BookController::class);
    Route::resource('registrations', PeminjamanController::class);

    Route::patch('/registrations/{peminjaman}/update-status', [PeminjamanController::class, 'updateStatus'])->name('registrations.update-status');
    Route::get('registrations/cetak/{id}', [PeminjamanController::class, 'cetak'])->name('registrations.cetak');
});

//Route::delete('/registrations/{peminjaman}', [PeminjamanController::class, 'destroy'])->name('registrations.destroy');
//Route::patch('/registrations/{id}/update-status', [PeminjamanController::class, 'updateStatus'])->name('registrations.updateStatus');

require __DIR__ . '/auth.php';
