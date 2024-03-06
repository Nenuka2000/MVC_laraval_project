<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
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
    return view('home');
});

Route::get('/view/{view}', function ($view) {
    return view($view);
});

Route::get('/login', [AuthController::class, 'login_form'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register_form']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/books', [BookController::class, 'index_client']);
Route::get('/books/{book}', [BookController::class, 'show_client']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile_form']);
    Route::post('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/cart/', [CartController::class, 'view']);
    Route::post('/cart/add/{book}', [CartController::class, 'add']);
    Route::post('/cart/sub/{book}', [CartController::class, 'sub']);
    Route::post('/cart/remove/{book}', [CartController::class, 'remove']);

    Route::get('/checkout', [OrderController::class, 'checkout_form']);
    Route::post('/checkout', [OrderController::class, 'checkout']);

    Route::get('/orders', [OrderController::class, 'index_client']);
    Route::get('/orders/{order}', [OrderController::class, 'show_client']);


    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function () {
        Route::resource('/books', BookController::class);
        Route::resource('/orders', OrderController::class);
        Route::resource('/users', UserController::class);
    });
});
