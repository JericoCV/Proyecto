<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Muestra el dashboard del estudiante.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard.student');
    }
}
