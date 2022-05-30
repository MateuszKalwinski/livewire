<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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

Route::get('/', function () {
    return redirect(route('login'));
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/products', function () {return view('dashboard');})->name('dashboard');
    Route::get('/products/create', [ProductController::class, 'create'])->name('create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('store');
    Route::get('/products/show/{product}', [ProductController::class, 'show'])->name('show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::patch('/products/{product}', [ProductController::class, 'update'])->name('update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('destroy');

});
