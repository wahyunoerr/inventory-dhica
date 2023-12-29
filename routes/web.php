<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductInController;
use App\Http\Controllers\ProductOutController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'dashboard')->name('dashboard');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/kategori', 'index')->name('kategori');
        Route::get('/kategori/create', 'create')->name('kategori.create');
        Route::post('/kategori', 'store')->name('kategori.save');
        Route::put('/kategori/edit/{category}', 'edit')->name('kategori.edit');
        Route::put('/kategori/update/{category}', 'update')->name('kategori.update');
        Route::delete('/kategori/{category}', 'destroy')->name('kategori.delete');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/produk', 'index')->name('produk');
        Route::get('/produk/create', 'create')->name('product.create');
        Route::post('/produk', 'store')->name('product.save');
        Route::put('/produk/edit/{product}', 'edit')->name('product.edit');
        Route::put('/produk/update/{product}', 'update')->name('product.update');
        Route::delete('/produk/{product}', 'destroy')->name('product.delete');
    });

    Route::controller(ProductInController::class)->group(function () {
        Route::get('/produkIn', 'index')->name('produkIn');
        Route::get('/produkIn/create', 'create')->name('produkIn.create');
        // Route::put('/produkIn/edit/{product_in}', 'create')->name('produkIn.edit');
        Route::post('/produkIn/save', 'store')->name('produkIn.save');
        Route::delete('produkIn/{product_in}', 'destroy')->name('produkIn.delete');
    });

    Route::controller(ProductOutController::class)->group(function () {
        Route::get('/produkOut', 'index')->name('produkOut');
        Route::get('/produkOut/create', 'create')->name('produkOut.create');
        Route::post('/produkOut/save', 'store')->name('produkOut.save');
        Route::delete('/produkOut/{product_in}', 'destroy')->name('produkOut.delete');
    });
});

require __DIR__ . '/auth.php';
