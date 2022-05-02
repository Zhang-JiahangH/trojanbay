<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;
use App\Models\Bookmark;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// homepage
Route::get('/', function () {return view('home');})->name('home');


// log system
Route::get('/register', [RegistrationController::class, 'index'])->name('registration.index');
Route::post('/register', [RegistrationController::class, 'register'])->name('registration.create');
// login
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

// search
Route::get('/search', [ProductController::class, 'searchform'])->name('search.index');
Route::post('/search', [ProductController::class, 'search'])->name('search');


// product system
Route::get('/textbook', [ProductController::class, 'textbook'])->name('textbook.index');
Route::get('/technology', [ProductController::class, 'technology'])->name('technology.index');
Route::get('/ticket', [ProductController::class, 'ticket'])->name('ticket.index');
Route::get('/other', [ProductController::class, 'other'])->name('other.index');


// block system
Route::view('/block/buyer', 'block.buyer')->name('block.buyer');
Route::view('/block/seller', 'block.seller')->name('block.seller');


Route::middleware(['auth'])->group(function () {
    // profile system
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    
    
    // logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');


    Route::get('/product/detail/{id}', [ProductController::class, 'index'])->name('product.detail');


    Route::middleware(['prevent-buyer-users'])->group(function () {
        // product manage(CURD)
        Route::get('/product/new', [ProductController::class, 'create'])->name('product.create');
        Route::post('/product', [ProductController::class, 'store'])->name('product.store');
        Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/product/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/product/{id}/delete', [ProductController::class, 'delete'])->name('product.delete');


        // shop manage(CURD)
        Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
    });


    Route::middleware(['prevent-seller-users'])->group(function () {
        // bookmark manage(CURD)
        Route::get('/bookmark', [BookmarkController::class, 'index'])->name('bookmark.index');
        Route::get('/bookmark/{user_id}/{product_id}', [BookmarkController::class, 'store'])->name('bookmark.create');
        Route::get('/bookmark/{user_id}/{product_id}/delete', [BookmarkController::class, 'delete'])->name('bookmark.delete');
    });

    // comment system
    Route::get('/comment/detail/{product_id}', [CommentController::class, 'index'])->name('comment.index');
    Route::get('/comment/create/{product_id}', [CommentController::class, 'create'])->name('comment.create');
    Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/comment/{id}/edit', [CommentController::class, 'edit'])->name('comment.edit');
    Route::post('/comment/{id}', [CommentController::class, 'update'])->name('comment.update');
    Route::get('/cooment/{id}/{product_id}/delete', [CommentController::class, 'delete'])->name('comment.delete');
});


if (env('APP_ENV') !== 'local') {
    URL::forceScheme('https');
} 

