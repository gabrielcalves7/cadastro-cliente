<?php

use App\Http\Controllers\CustomerController;
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

Route::prefix('customers')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::get('/{customer}', [CustomerController::class, 'show'])->name('customers.show');
    Route::get('/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::post('/', [CustomerController::class, 'update'])->name('customers.update');
    Route::post('/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
});

