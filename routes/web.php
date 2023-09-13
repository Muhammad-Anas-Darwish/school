<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ExaminationMarkController;
use App\Http\Controllers\MarksYearController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;

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
    return view('home');
})->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::get('students/profile', [StudentController::class, 'showProfile'])->name('students.showProfile');
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

// Year Routes
Route::resource('years', YearController::class);

// Student Routes
Route::resource('students', StudentController::class);
Route::group(['middleware' => ['auth']], function() {
    Route::get('students/profile', [StudentController::class, 'showProfile'])->name('students.showProfile');
});

// Note Routes
Route::get('notes/all', [NoteController::class, 'ShowNotes'])->name('notes.showNotes')->middleware('auth', 'student');
Route::resource('notes', NoteController::class);

// User Routes
Route::resource('users', UserController::class)->only(['edit', 'update'])->parameters(['users' => 'user:username']);

// Subject Routes
Route::resource('subjects', SubjectController::class);

// Mark Year Routes
Route::resource('marks_year', MarksYearController::class);

Route::resource('examination_marks', ExaminationMarkController::class);

// Setting Routes
Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
Route::patch('settings', [SettingController::class, 'update'])->name('settings.update');
