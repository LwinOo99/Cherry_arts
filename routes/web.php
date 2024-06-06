<?php

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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/auth/home', [App\Http\Controllers\Auth\HomeController::class, 'index'])->name('auth.home')->middleware('isAdmin');

Route::get('/User/userHome', [App\Http\Controllers\HomeController::class, 'index'])->name('user.userHome');
Route::get('/admin/adminHome', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.adminHome');

Route::get('/marketPlace', [App\Http\Controllers\MarketPlaceController::class, 'index'])->name('marketPlace');

Route::get('/marketPlace', [App\Http\Controllers\MarketPlaceController::class, 'index'])->name('marketPlace');

// Route::get('/manageProducts', [App\Http\Controllers\Admin\ManageProductController::class, 'index'])->name('admin.manageProducts');
Route::resource('/manageProduct', App\Http\Controllers\Admin\ManageProductController::class);
Route::resource('/productCategory', App\Http\Controllers\categoryController::class);
// Route::resource('/productCategory', App\Http\Controllers\Admin\productCategoryController::class);

Route::resource('/pageSetting', App\Http\Controllers\pageSettingController::class);
