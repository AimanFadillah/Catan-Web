<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatanController;
use App\Http\Controllers\LoginController;

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
Route::get("/",[CatanController::class,"index"]);
Route::get("/test",[CatanController::class,"test"]);

// Login
Route::post("/login",[LoginController::class,"auth"]);
Route::post("/daftar",[LoginController::class,"store"]);
