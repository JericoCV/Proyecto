<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    // Muestra la lista de cursos
    public function index()
    {
        $courses = Course::with('teacher')->get(); // Asume que hay una relación 'teacher' en el modelo Course
        return view('courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $course = Course::with('teacher')->findOrFail($course->id); // Asume que hay una relación 'teacher' en el modelo Course
        $archives = ArchiveController::getArchivesByCourseId($course->id);
        return view('courses.show')->with(compact('course', 'archives'));
    }

    // Muestra el formulario para crear un nuevo curso
    public function create()
    {
        // Filtra usuarios con rol de 'teacher'
        $teachers = User::whereHas('role', function ($query) {
            $query->whereIn('role_name', ['Docente']);
        })->get();
        return view('courses.create', compact('teachers'));
    }

    // Almacena un nuevo curso
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|string|max:50',
            'mode' => 'required|string|max:50',
            'teacher_id' => 'required|exists:users,id',
        ]);

        Course::create($validatedData);
        return redirect()->route('courses.index')->with('success', 'Curso creado correctamente.');
    }

    // Muestra el formulario para editar un curso existente
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $teachers = User::whereHas('role', function ($query) {
            $query->whereIn('role_name', ['Docente']);
        })->get();
        return view('courses.edit', compact('course', 'teachers'));
    }

    // Actualiza un curso existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'mode' => 'required|string|max:50',
            'level' => 'required|string|max:50',
            'teacher_id' => 'required|exists:users,id',
        ]);

        $course = Course::findOrFail($id);
        $course->update($validatedData);
        return redirect()->route('courses.index')->with('success', 'Curso actualizado correctamente.');
    }

    // Elimina un curso
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Curso eliminado correctamente.');
    }

    // Asigna estudiantes a un curso
    public function assignStudents($course_id)
    {
        // Obtener el curso
        $course = Course::findOrFail($course_id);

        // Obtener los IDs de los estudiantes ya asignados al curso
        $assignedStudentIds = DB::table('students')
            ->where('course_id', $course_id)
            ->pluck('student_id');

        // Obtener estudiantes con rol 'Estudiante' que NO están asignados al curso
        $studentsNotAssigned = User::whereHas('role', function ($query) {
            $query->where('role_name', 'Estudiante');
        })->whereNotIn('id', $assignedStudentIds)
            ->get();

        // Obtener estudiantes que SÍ están asignados al curso
        $studentsAssigned = User::whereHas('role', function ($query) {
            $query->where('role_name', 'Estudiante');
        })->whereIn('id', $assignedStudentIds)
            ->get();

        return view('courses.assign-students', compact('course', 'studentsNotAssigned', 'studentsAssigned'));
    }



    // Guarda los estudiantes asignados al curso
    public function storeAssignedStudents(Request $request, $course_id)
    {
        $course = Course::findOrFail($course_id);
        $studentIds = $request->input('students'); // Array de IDs de estudiantes seleccionados

        // Limpia los estudiantes actuales y asigna los nuevos
        foreach ($studentIds as $studentId) {
            $name = UserController::getUserNameById($studentId);
            Student::create([
                'name' => 'Estudiante',
                'fullname' => $name->name,
                'student_id' => $studentId,
                'course_id' => $course_id,
            ]);
        }

        return redirect()->route('courses.assignStudents', $course_id)->with('success', 'Estudiantes asignados correctamente al curso.');
    }

    public function removestudentfromCourse($course_id, $student_id)
    {
        // Limpia los estudiantes actuales y asigna los nuevos
        Student::where('course_id', $course_id)->where('student_id', $student_id)->delete();
        return redirect()->route('courses.assignStudents', $course_id)->with('success', 'Se ha eliminado al estudiante del curso');
    }

    public function myCourses()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Obtener los cursos que dicta el usuario actual (como profesor)
        $courses = Course::where('teacher_id', $user->id)->get();

        return view('courses.my-courses', compact('courses'));
    }

    public function myCourse($course_id)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
        $course = Course::with('activities')->where('teacher_id', $user->id)->where('id', $course_id)->first();
        $archives = ArchiveController::getArchivesByCourseId($course_id);

        // Obtener los meses, asegurándose de que no haya valores vacíos
        $months = $course->activities->pluck('month')
            ->filter(function ($month) {
                return !empty($month); // Filtra valores vacíos
            })
            ->unique()
            ->values();

        return view('courses.my-course')->with(compact('course', 'archives', 'months'));
    }


    public static function getCourseById($id)
    {
        $course = Course::findOrFail($id);
        return $course;
    }
}
