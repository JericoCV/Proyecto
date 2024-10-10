<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role_id == 1) {
            return view('dashboard.admin');  // Vista para administrador
        } elseif ($user->role_id == 2) {
            return view('dashboard.teacher');  // Vista para docente
        } else {
            return view('dashboard.student');  // Vista para alumno
        }
    }
}