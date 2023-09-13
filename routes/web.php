<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientOrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/PatOrdIn', [PatientOrderController::class, 'index'])->name('patient_order.index');
Route::get('/PatOrdIn/add', [PatientOrderController::class, 'create'])->name('patient_order.add');
Route::post('/PatOrdIn/store', [PatientOrderController::class, 'store'])->name('patient_order.store');


