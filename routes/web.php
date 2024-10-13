<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

require __DIR__.'/auth.php';

/******************USER CONTROLLER GROUP*******************/

/*************REDIRECCION DE DASHBOARDS*************/

Route::get('/dashboard', function () {
    // Verifica el rol del usuario autenticado
    $user = Auth::user();

    if ($user->role_id == 1) {
        // Redirige a Admin dashboard
        return redirect()->route('admin.dashboard');
    } elseif ($user->role_id == 2) {
        // Redirige a Teacher dashboard
        return redirect()->route('teacher.dashboard');
    } elseif ($user->role_id == 3) {
        // Redirige a Student dashboard
        return redirect()->route('student.dashboard');
    } else {
        // Si el usuario no tiene un rol válido, redirigirlo a la página de bienvenida o un error
        return redirect()->route('home');
    }
})->middleware(['auth'])->name('dashboard');    

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

/***************ACCOUNTS SETTINGS****************/

use App\Http\Controllers\ProfileController;

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
