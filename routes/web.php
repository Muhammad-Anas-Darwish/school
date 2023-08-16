<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ExamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SemesterController;

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

Route::get('', function () {
    return '<h1>home</h1>';
});

Route::group(['middleware' => ['auth']], function() {
    /**
     * Logout Routes
     */
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout');

});

Route::group(['middleware' => ['guest']], function() {
    /**
     * Login Routes
     */
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

// Grades Routes
Route::resource('grades', GradeController::class);

// Semesters Routes
Route::resource('semesters', SemesterController::class);

// Exams Routes
Route::resource('exams', ExamController::class);

// Classrooms Routes
Route::resource('classrooms', ClassroomController::class);
