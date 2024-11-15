<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('rentcar');
// });

Route::get('/', [HomeController::class, 'rentcar']);

Route::get('/login', function () {
    return view('auth/login');
});

// Route::get('/register', function () {
//     return view('auth/register');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::prefix('/home')->name('home.')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('index'); // Menampilkan daftar konten
        Route::get('create', [HomeController::class, 'create'])->name('create'); // Menampilkan form tambah konten
        Route::post('store', [HomeController::class, 'store'])->name('store'); // Menyimpan konten baru
        Route::get('{home}/edit', [HomeController::class, 'edit'])->name('edit'); // Menampilkan form edit
        Route::put('{home}', [HomeController::class, 'update'])->name('update'); // Menyimpan perubahan
        Route::delete('{home}', [HomeController::class, 'destroy'])->name('destroy'); // Menghapus konten
    });
    
    
    
});

require __DIR__.'/auth.php';
