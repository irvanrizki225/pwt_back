<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SignatureController;
use App\Http\Controllers\PermitController;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Auth::routes(['register' => true]);

Route::resource('product', ProductController::class);
Route::resource('permit', PermitController::class);


// Route::post('/oke', [ProductController::class, 'store'])->name('oke');



Auth::routes();

Route::get('tanda-tangan', [SignatureController::class, 'index'])->name('signature.index');
Route::get('tanda-tangan/create', [SignatureController::class, 'create'])->name('signature.create');
Route::post('tanda-tangan/store',[SignatureController::class, 'store'])->name('signature.store');
