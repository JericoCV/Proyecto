<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/******************USER CONTROLLER GROUP*******************/

/*Admin route*/
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

/*Teacher route*/
use App\Http\Middleware\TeacherMiddleware;
use App\Http\Controllers\TeacherController;

Route::middleware(['auth', TeacherMiddleware::class])->group(function () {
    Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.dashboard');
});

/*Student route*/
use App\Http\Middleware\StudentMiddleware;
use App\Http\Controllers\StudentController;

Route::middleware(['auth', StudentMiddleware::class])->group(function () {
    Route::get('/student', [StudentController::class, 'index'])->name('student.dashboard');
});



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
