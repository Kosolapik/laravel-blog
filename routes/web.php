<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Post\PostController as FrontPostController;
use App\Http\Controllers\Admin\Post\PostController as AdmiPostController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Category\CategoryController as AdminCategoryController;

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
    return redirect()->route('front.post.index');
});

Auth::routes();



Route::name('front.')->group(function () {
    Route::resource('post', FrontPostController::class);
});
Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('post', AdmiPostController::class);
    Route::resource('category', AdminCategoryController::class);
});