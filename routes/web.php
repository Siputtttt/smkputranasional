<?php

use App\Http\Controllers\depanController;
use App\Http\Controllers\komentarController;
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

Route::get('/', [depanController::class, 'index']);
Route::get('/blog', [depanController::class, 'blog']);
Route::get('/blogDetail/{judul}', [depanController::class, 'blogDetail']);
Route::post('/komentars', [depanController::class, 'komenDetail']);
Route::get('/blogKategori/{kategori}', [depanController::class, 'blogKategori']);
Route::get('/visimisi', [depanController::class, 'visimisi']);
Route::get('/galeris', [depanController::class, 'galeri']);
Route::get('/kontak', [depanController::class, 'kontak']);
Route::post('/kontakKirim', [depanController::class, 'kontakKirim']);



Route::middleware('auth', 'verified')->group(
    function () {
        Route::resource('/Blog', App\Http\Controllers\blogController::class);
        Route::resource('/Kategori', App\Http\Controllers\kategoriController::class);
        Route::resource('/Komentar', App\Http\Controllers\komentarController::class);
        Route::resource('/GaleriA', App\Http\Controllers\galeriController::class);
        Route::resource('/KontakA', App\Http\Controllers\kontakController::class);
    }
);
Route::middleware('auth', 'verified')->group(
    function () {
        Route::resource('/user', App\Http\Controllers\Auth\AuthenticatedSessionController::class);
        Route::get('/user/hapusUser/{email}', [ProfileController::class, 'hapusUser']);
    }
);

Route::get('/dashboard', function () {
    $title = "dashboard";
    return view('admin.dashboard', compact('title'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
