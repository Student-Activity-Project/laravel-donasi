<?php

use App\Http\Controllers\DonasiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

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

Route::post("/auth/login", [LoginController::class, "login"]);

Route::middleware(['auth:sanctum'])->group(function() {
    Route::prefix('auth')->group(function () {
        Route::get("/profil", [UserController::class, "profil"]);
        Route::post("/logout", [LoginController::class, "logout"]);
    });

    Route::prefix('donasi')->group(function () {
        Route::get("/list_kampanye", [DonasiController::class, "list_kampanye"]);
        Route::get("/kampanye_saya", [DonasiController::class, "kampanye_saya"]);
        Route::get("/detail_kampanye/{id}", [DonasiController::class, "detail_kampanye"]);
        Route::post("/open_kampanye", [DonasiController::class, "open_kampanye"]);
        Route::delete("/hapus_kampanye", [DonasiController::class, "hapus_kampanye"]);
        Route::post("/beri_donasi", [DonasiController::class, "beri_donasi"]);
    });

    
});
