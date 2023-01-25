<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\AttendancesController;
use App\Http\Controllers\EnrollsController;
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

//Resourse Routes
Route::resource("students", StudentsController::class);
Route::resource("courses", CoursesController::class);
Route::resource("attendances", AttendancesController::class);

//Custom Routes
Route::resource("enrolls", EnrollsController::class)->only(["store"]);
Route::get("/courses/{course}/students", [CoursesController::class, "getStudents"]);
Route::get("/courses/{course}/attendances", [CoursesController::class, "getAttendances"]);
Route::get("/courses/{course}/byDate", [CoursesController::Class, "getByDate"]);
Route::get("/students/{student}/courses", [StudentsController::class, "getCourses"]);
