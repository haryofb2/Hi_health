<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\API\MasterData;
use App\Http\Controllers\API\TransactionData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [LoginController::class,'login']);


// Route::get('/master/m_cabang/show',[MasterDataController::class,'mastercabang'])->name('api.master.mastercabang');
Route::get('/t_registrasi/all', [TransactionData::class, 'tregistrasi'])->name('api.t_registrasi.all');

Route::post('/m_pemeriksaan/datatable/all', [MasterData::class, 'mpemeriksaandatatable'])->name('api.m_pemeriksaan.datatable.all');
Route::post('/m_pemeriksaan/choose', [MasterData::class, 'mpemeriksaanchoose'])->name('api.m_pemeriksaan.choose');

Route::post('/m_pasien/datatable/all', [MasterData::class, 'mpasiendatatable'])->name('api.m_pasien.datatable.all');
Route::post('/m_pilihan/dropdown', [MasterData::class, 'mpilihandropdown'])->name('api.m_pilihan.dropdown');
Route::post('/m_kota/dropdown', [MasterData::class, 'mkotadropdown'])->name('api.m_kota.dropdown');
Route::post('/m_pasien/choose', [MasterData::class, 'mpasienchoose'])->name('api.m_pasien.choose');
Route::post('/m_poliklinik/dropdown', [MasterData::class, 'mpoliklinikdropdown'])->name('api.m_poliklinik.dropdown');
Route::post('/m_dokter/datatable/poliklinik', [MasterData::class, 'mdokterpoliklinikdatatable'])->name('api.m_dokter.datatable.poliklinik');
Route::post('/m_dokter/choose', [MasterData::class, 'mdokterchoose'])->name('api.m_dokter.choose');
Route::post('/m_dokter/datatable/all', [MasterData::class, 'mdokterdatatable'])->name('api.m_dokter.datatable.all');


