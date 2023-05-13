<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Post\PostController as FrontPostController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Category\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\Tag\TagController as AdminTagController;
use App\Http\Controllers\Admin\Post\PostController as AdminPostController;
use App\Http\Controllers\Admin\User\UserController as AdminUserController;

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Account\Liked\LikedController as AccountLikedController;
use App\Http\Controllers\Account\Comment\CommentController as AccountCommentController;

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

Auth::routes(['verify' => true]);

Route::name('front.')->group(function () {
    Route::resource('post', FrontPostController::class);
});

Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin', 'verified'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('post', AdminPostController::class);
    Route::resource('category', AdminCategoryController::class);
    Route::resource('tag', AdminTagController::class);
    Route::resource('user', AdminUserController::class);
});

Route::name('account.')->prefix('account')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AccountController::class, 'dashboard'])->name('dashboard');
    Route::resource('liked', AccountLikedController::class);
    Route::resource('comment', AccountCommentController::class);
    // Route::resource('tag', AccountTagController::class);
});