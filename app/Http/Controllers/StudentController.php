<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        return view('dashboard.student');
    }
    // Muestra los cursos en los que está inscrito el estudiante
    public function courses()
    {
        $students = Student::where('student_id',Auth::user()->id)->get();
        $courses = [];
        foreach($students as $student_2){
            $courses[] = CourseController::getCourseById($student_2->course_id);
        }
        return view('students.courses', compact('courses'));
    }

    // Muestra las actividades de un curso específico para el estudiante
    public function activities($course_id)
    {
        $archives = ArchiveController::getArchivesByCourseIdForStudents($course_id);
        $course = Course::with([
            'activities' => function($query) {
                $query->orderBy('created_at', 'desc');
            },
            'activities.grades' => function($query) {
                // Filtramos las calificaciones por el ID del estudiante autenticado
                $query->where('student_id', StudentController::getStudentByUserId(Auth::user()->id));
            }
        ])->findOrFail($course_id);
        
        return view('students.activities')->with(compact('course', 'archives'));
    }

    public static function getStudentByUserId($id){
        $students = Student::where('student_id',$id)->first();
        return $students->id;
    }   
}
