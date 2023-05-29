<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// normal routing
Route::view("/", "login");
Route::view("/admin_login", "admin_login");
Route::view("/register", "register");
Route::view("/user", "User");
Route::view("/admin", "admin");

// route controller
Route::post("/loginUser",[UserController::class,"login"]);
Route::get("/logout",[UserController::class,"logout"]);
Route::get("/logoutAdmin",[UserController::class,"logoutAdmin"]);
Route::post("/registerUser",[UserController::class,"register"]);
Route::post("/loginAdmin",[UserController::class,"admin_login"]);