<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Muestra el dashboard del docente.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard.teacher');
    }
}
