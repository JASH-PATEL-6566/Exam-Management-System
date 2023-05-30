<?php

use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
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

// user controller
Route::post("/loginUser",[UserController::class,"login"]);
Route::get("/logout",[UserController::class,"logout"]);
Route::get("/logoutAdmin",[UserController::class,"logoutAdmin"]);
Route::post("/registerUser",[UserController::class,"register"]);
Route::post("/loginAdmin",[UserController::class,"admin_login"]);

// exam controller
Route::post("/create_new_exam",[ExamController::class,"createExam"]);
Route::get("/admin",[ExamController::class,"fetchExam"]);
Route::get("/edit_exam/{id}",[ExamController::class,"editExamIndex"]);
Route::get("/delete_exam/{id}",[ExamController::class,"deleteExam"]);
Route::post("/edit_exam",[ExamController::class,"editExam"]);

// question controller
Route::get("/questions/{id}",[QuestionController::class,"questionsIndex"]);
Route::get("/edit_question/{id}",[QuestionController::class,"editQuestion"]);
Route::post("/addQuestion",[QuestionController::class,"addQuestion"]);
Route::post("/edit_question",[QuestionController::class,"editQuestionInfo"]);
Route::get("/delete_question/{id}",[QuestionController::class,"deleteQuestion"]);