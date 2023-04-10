<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Front\WelcomeController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\ContactController;

// i didn't migrate table on review and order in table we cannot migrate or create table or datable//

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

Route::get('/admin/dashboard', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
Route::get('master', function () {
    return view('layouts.master');
});

// Category
Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('categories', [CategoryController::class, 'index'])->name('categories');
Route::get('categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::get('categories/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');


//Product
Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('products', [ProductController::class, 'index'])->name('products');
Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');


// CMS

Route::get('cms/create', [CmsController::class, 'create'])->name('cms.create');
Route::post('cms/store', [CmsController::class, 'store'])->name('cms.store');
Route::get('cms', [CmsController::class, 'index'])->name('cms');
Route::get('cms/edit/{id}', [CmsController::class, 'edit'])->name('cms.edit');
Route::post('cms/update/{id}', [CmsController::class, 'update'])->name('cms.update');
Route::get('cms/delete/{id}', [CmsController::class, 'delete'])->name('cms.delete');


// soft delete
//order
Route::get('order/index', [OrderController::class, 'index'])->name('order.index');

//Brand
Route::get('brands/create', [BrandController::class, 'create'])->name('brands.create');
Route::post('brands/store', [BrandController::class, 'store'])->name('brands.store');
Route::get('brands', [BrandController::class, 'index'])->name('brands');
Route::get('brands/edit/{id}', [BrandController::class, 'edit'])->name('brands.edit');
Route::post('brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
Route::get('brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
// soft delete


// colour
Route::get('color/create', [ColorController::class, 'create'])->name('color.create');
Route::post('color/store', [ColorController::class, 'store'])->name('color.store');
Route::get('colors', [ColorController::class, 'index'])->name('colors');
Route::get('color/edit/{id}', [ColorController::class, 'edit'])->name('color.edit');
Route::post('color/update/{id}', [ColorController::class, 'update'])->name('color.update');
Route::get('color/delete/{id}', [ColorController::class, 'delete'])->name('color.delete');


// soft delete

// review (create with database)
Route::get('review/index', [ReviewController::class, 'index'])->name('review.index');
//
// e-comerce //
Route::get('/', [WelcomeController::class, 'index'])->name('index');
Route::get('/contact', [WelcomeController::class, 'contact'])->name('contact');
Route::get('/about', [WelcomeController::class, 'about'])->name('about');
Route::get('/shop', [WelcomeController::class, 'shop'])->name('shop');
Route::get('/shop-single', [WelcomeController::class, 'shopsingle'])->name('shopsingle');
Route::get('/cart', [WelcomeController::class, 'cart'])->name('cart');
Route::get('/checkout', [WelcomeController::class, 'checkout'])->name('checkout');
Route::get('/thankyou', [WelcomeController::class, 'thankyou'])->name('thankyou');

//Contact//
Route::post('contact/message/store',[ContactController::class,'contact_message_store'])->name('contact.message.store');
