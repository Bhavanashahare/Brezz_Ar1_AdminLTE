<?php

use App\Http\Controllers\BrandController;



use App\Http\Controllers\ColorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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
});

require __DIR__.'/auth.php';
Route::get('master', function () {
    return view('layouts.master');
});

// Category
Route::get('category/form', [CategoryController::class, 'form'])->name('category.form');
Route::post('store', [CategoryController::class, 'store'])->name('store');
Route::get('category/table', [CategoryController::class, 'table'])->name('category.table');
Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');
Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('delete');


//Product
Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('product/table', [ProductController::class, 'table'])->name('product.table');
Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

// CMS

Route::get('cms/create', [CmsController::class, 'create'])->name('cms.create');
Route::post('cms/store', [CmsController::class, 'store'])->name('cms.store');
Route::get('cms/table', [CmsController::class, 'table'])->name('cms.table');
Route::get('cms/edit/{id}', [CmsController::class, 'edit'])->name('cms.edit');
Route::post('cms/update/{id}', [CmsController::class, 'update'])->name('cms.update');
Route::get('cms/delete/{id}', [CmsController::class, 'delete'])->name('cms.delete');


//order

Route::get('order/index', [OrderController::class, 'index'])->name('order.index');

//Brand
Route::get('brand/create', [BrandController::class, 'create'])->name('brand.create');
Route::post('brand/store', [BrandController::class, 'store'])->name('brand.store');
Route::get('brand/table', [BrandController::class, 'table'])->name('brand.table');
Route::get('brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
Route::post('brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
Route::get('brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');


// colour


Route::get('color/create', [ColorController::class, 'create'])->name('color.create');
Route::post('color/store', [ColorController::class, 'store'])->name('color.store');
Route::get('color/table', [ColorController::class, 'table'])->name('color.table');
Route::get('color/edit/{id}', [ColorController::class, 'edit'])->name('color.edit');
Route::post('color/update/{id}', [ColorController::class, 'update'])->name('color.update');
Route::get('color/delete/{id}', [ColorController::class, 'delete'])->name('color.delete');





