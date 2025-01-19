<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;

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

// Route::get('/', function () {
//     return view('app');
// });
Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
Route::resource('customers', CustomerController::class);
Route::resource('contacts', ContactController::class)->except(['index', 'show', 'create']);
Route::resource('sales', SaleController::class)->except(['index', 'show', 'create']);
Route::get('customers/{customer}/contacts/create', [ContactController::class, 'create'])->name('customers.contacts.create');
Route::post('customers/{customer}/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('customers/{customer}/sales/create', [SaleController::class, 'create'])->name('customers.sales.create');
Route::get('sales/report', [SaleController::class, 'report'])->name('sales.report');