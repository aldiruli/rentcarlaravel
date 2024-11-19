<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
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
Route::get('/rentcar', [CarController::class, 'rentcar'])->name('rentcar');

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
        Route::get('/', [HomeController::class, 'index'])->name('index'); 
        Route::get('create', [HomeController::class, 'create'])->name('create'); 
        Route::post('store', [HomeController::class, 'store'])->name('store'); 
        Route::get('{home}/edit', [HomeController::class, 'edit'])->name('edit');
        Route::put('{home}', [HomeController::class, 'update'])->name('update'); 
        Route::delete('{home}', [HomeController::class, 'destroy'])->name('destroy'); 
    });
    Route::prefix('cars')->name('cars.')->group(function () {
        Route::get('/', [CarController::class, 'index'])->name('index'); // List semua mobil
        Route::get('/create', [CarController::class, 'create'])->name('create'); // Form tambah mobil
        Route::post('/store', [CarController::class, 'store'])->name('store'); // Proses tambah mobil
        Route::get('/{car}/edit', [CarController::class, 'edit'])->name('edit'); // Form edit mobil
        Route::put('/{car}', [CarController::class, 'update'])->name('update'); // Proses edit mobil
        Route::delete('/{car}', [CarController::class, 'destroy'])->name('destroy'); // Hapus mobil
    });
    
    
    
    
    
});

require __DIR__.'/auth.php';
