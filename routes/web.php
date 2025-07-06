<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BabyController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BirthController;
use App\Http\Controllers\SaleReportController;

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
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('sales/datatable', [SaleController::class, 'datatable'])->name('sales.datatable');
Route::resource('sales', SaleController::class);

Route::get('babies/datatable', [BabyController::class, 'datatable'])->name('babies.datatable');
Route::resource('babies', BabyController::class);

Route::get('users/datatable', [UserController::class, 'datatable'])->name('users.datatable');
Route::resource('users', UserController::class);

Route::resource('births', BirthController::class);

Route::resource('sale-reports', SaleReportController::class);