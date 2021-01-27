<?php

use App\Http\Controllers\Master\MasterUserController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/datauser/{id}', [MasterUserController::class, 'show']);
Route::middleware(['auth:sanctum', 'verified'])->get('/data-covid', function () {
    return Inertia\Inertia::render('DataCovid');
})->name('data-covid');

Route::middleware(['auth:sanctum', 'verified'])->get('/master-wilayah', function () {
    return Inertia\Inertia::render('MasterDataWilayah');
})->name('master-wilayah');

Route::middleware(['auth:sanctum', 'verified'])->get('/master-pusat', function () {
    return Inertia\Inertia::render('MasterDataPusat');
})->name('master-pusat');

Route::middleware(['auth:sanctum', 'verified'])->get('/master-balai', function () {
    return Inertia\Inertia::render('MasterDataBalai');
})->name('master-balai');

Route::middleware(['auth:sanctum', 'verified'])->get('/master-loka', function () {
    return Inertia\Inertia::render('MasterDataLoka');
})->name('master-loka');

Route::middleware(['auth:sanctum', 'verified'])->get('/master-user', function () {
    return Inertia\Inertia::render('MasterDataUser');
})->name('master-user');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
