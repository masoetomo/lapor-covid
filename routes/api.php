<?php

use App\Http\Controllers\DashboardChartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterUnitController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('datacovid','App\Http\Controllers\DataCovidController')->middleware('api');
Route::apiResource('datawilayah','App\Http\Controllers\MasterWilayahController')->middleware('api');
Route::apiResource('datapusat','App\Http\Controllers\MasterUnitController')->middleware('api');
Route::apiResource('databalai','App\Http\Controllers\MasterBalaiController')->middleware('api');
Route::apiResource('dataloka','App\Http\Controllers\MasterLokaController')->middleware('api');
Route::apiResource('datauser','App\Http\Controllers\Master\MasterUserController')->middleware('api');
Route::apiResource('data-tipe-akun','App\Http\Controllers\Master\TipeAkunController')->middleware('api');
Route::get('/datapusat/get-unit/{wilayah}', [MasterUnitController::class, 'getUnit'])->middleware('api');
Route::get('/data-dashboard', [DashboardChartController::class, 'index'])->middleware('api');
