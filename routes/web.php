<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CreatePetugasController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [BookController::class, 'index'])->name('dashboard');
Route::post('/', [BookController::class, 'store'])->name('addBooks');

Route::get('/books/{book_url}', [BookController::class, 'details'])->name('books.details');

Route::middleware('auth')->group(function () {
    Route::get('/bookmark', [BookmarkController::class, 'index'])->name('bookmarks.index');
    Route::post('/toggle-bookmark/{book}', [BookmarkController::class, 'toggleBookmark'])->name('toggle.bookmark');
    Route::get('/laporan-peminjaman', [PeminjamanController::class, 'index'])
        ->middleware('role:Administrator,Petugas')
        ->name('laporan.index');
    Route::get('/create-petugas', [CreatePetugasController::class, 'index'])->middleware('role:Administrator')->name('create.petugas');
    Route::post('/create-petugas', [CreatePetugasController::class, 'store'])->middleware('role:Administrator')->name('create.petugas');
    Route::post('/books/{book_url}/rate', [BookController::class, 'rateBook'])->name('books.rate');
    Route::get('/loans', [LoanController::class, 'index'])->name('peminjamBuku.index');
    Route::get('/loans/{book}', [LoanController::class, 'create'])->name('peminjamBuku.create');
    Route::post('/loans/{book}', [LoanController::class, 'store'])->name('peminjamBuku.store');
    Route::get('/loans/terminate/{loan}', [LoanController::class, 'terminate'])->name('peminjamBuku.terminate');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
