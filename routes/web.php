<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/product', [ProductoController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductoController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductoController::class, 'store'])->name('product.store');
Route::get('/product/edit/{product}', [ProductoController::class, 'edit'])->name('product.edit');
Route::get('/product/update/{product}', [ProductoController::class, 'update'])->name('product.update');
Route::delete('/product/{productos}', [ProductoController::class, 'destroy'])->name('product.destroy');
Route::get('/product/pdf', [ProductoController::class, 'pdf'])->name('product.pdf');

Route::get('/category', [CategoriaController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoriaController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoriaController::class, 'store'])->name('category.store');
Route::get('/category/edit/{category}', [CategoriaController::class, 'edit'])->name('category.edit');
Route::get('/category/update/{category}', [CategoriaController::class, 'update'])->name('category.update');
Route::delete('/category/{categorias}', [CategoriaController::class, 'destroy'])->name('category.destroy');

Route::get('/graficos', [CategoriaController::class, 'Grafico'])->name('graficos.Grafico');
Route::get('/category/pdf', [CategoriaController::class, 'pdf'])->name('category.pdf');
