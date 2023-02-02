<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SekilasResource;
use App\Http\Controllers\PentingResource;
use App\Http\Controllers\MingguanResource;

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

// Beranda
Route::get("/",[CatanController::class,"index"])->name("login");

// Login
Route::post("/login",[LoginController::class,"auth"]);
Route::post("/daftar",[LoginController::class,"store"]);
Route::post("/logout",[LoginController::class,"logout"]);

// Sekilas
Route::resource('/sekilas',SekilasResource::class);
Route::resource('/penting',PentingResource::class);
Route::resource('/mingguan',MingguanResource::class);