<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AddressController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource([
//     '/categories' => CategoryController::class,

// ]);
Route::apiResource('/categories', CategoryController::class);
Route::prefix('/address')->name('address.')->group(function () {
    Route::get("/provinces", [AddressController::class, "provinces"])->name('provinces');
    Route::get("/districts/{id}", [AddressController::class, "districts"])->name('districts');
    Route::get("/wards/{id}", [AddressController::class, "wards"])->name('wards');
});
