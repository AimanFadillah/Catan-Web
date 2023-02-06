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
Route::get("/datatable",[CatanController::class,"dataTable"])->name("login");

// Login
Route::post("/login",[LoginController::class,"auth"]);
Route::post("/daftar",[LoginController::class,"store"]);
Route::post("/logout",[LoginController::class,"logout"]);

// Sekilas
Route::resource('/Sekilas',SekilasResource::class)->middleware("auth");

// Penting
Route::resource('/Penting',PentingResource::class)->middleware("auth");
Route::get("/ajax1238129312",[PentingResource::class,"ajax"])->middleware("auth");

// Mingguan
Route::resource('/Mingguan',MingguanResource::class)->middleware("auth");