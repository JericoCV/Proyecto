<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    // Muestra las actividades del curso al que pertenece el profesor
    public function index($course_id)
    {
        // Obtener el curso junto con sus actividades
        $course = Course::with('activities')->findOrFail($course_id);

        // Extraer los meses únicos de las actividades
        $months = $course->activities->pluck('month')->unique()->values();

        return view('activities.index', compact('course', 'months'));
    }

    // Muestra el formulario para crear una nueva actividad
    public function create($courseId)
    {
        // Obtener el curso
        $course = Course::findOrFail($courseId);

        // Meses ya ocupados por actividades de este curso
        $occupiedMonths = Activity::where('course_id', $courseId)->pluck('month')->unique()->toArray();

        // Lista de todos los meses
        $months = [
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre'
        ];

        // Filtrar los meses disponibles
        $availableMonths = array_diff($months, $occupiedMonths);

        return view('activities.create', compact('course', 'availableMonths'));
    }


    // Almacena una nueva actividad
    public function store(Request $request, $courseId)
    {
        $request->validate([
            'month' => 'required|string', // El mes debe ser seleccionado
        ]);

        $course = Course::findOrFail($courseId);

        // Verificar si el mes ya tiene actividades
        if (Activity::where('course_id', $course->id)->where('month', $request->month)->exists()) {
            return redirect()->back()->withErrors(['month' => 'Este mes ya tiene actividades creadas.']);
        }

        // Crear 4 actividades para el mes seleccionado
        $activity = Activity::create([
            'name' => 'Grammar',
            'course_id' => $course->id,
            'month' => $request->month,
        ]);
        GradeController::createGradeforStudentsByCourseId($course->id, $activity->id, Auth::user()->id);
        $activity = Activity::create([
            'name' => 'Speaking',
            'course_id' => $course->id,
            'month' => $request->month,
        ]);
        GradeController::createGradeforStudentsByCourseId($course->id, $activity->id, Auth::user()->id);
        $activity = Activity::create([
            'name' => 'Reading',
            'course_id' => $course->id,
            'month' => $request->month,
        ]);
        GradeController::createGradeforStudentsByCourseId($course->id, $activity->id, Auth::user()->id);
        $activity = Activity::create([
            'name' => 'Listening',
            'course_id' => $course->id,
            'month' => $request->month,
        ]);
        GradeController::createGradeforStudentsByCourseId($course->id, $activity->id, Auth::user()->id);


        return redirect()->route('courses.myCourse', $courseId)
            ->with('success', 'Las 4 actividades se crearon correctamente.');
    }


    // Edita la actividad
    public function edit($course_id, $id)
    {
        $course = CourseController::getCourseById($course_id);
        $activity = Activity::findOrFail($id);
        return view('activities.edit', compact('activity', 'course'));
    }

    // Actualiza la actividad
    public function update(Request $request, $course_id, $id)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $activity = Activity::findOrFail($id);
        $activity->update(['name' => $request->name]);
        return redirect()->route('courses.myCourse', $course_id)
            ->with('success', 'Actividad actualizada correctamente.');
    }

    // Elimina la actividad
    public function destroy($course_id, $month)
    {
        $activity = Activity::where('course_id', $course_id)->where('month', $month)->delete();
        return redirect()->route('courses.myCourse', $course_id)
            ->with('success', 'Actividades eliminadas correctamente.');
    }

    public static function getActivitieByCourseId($id)
    {
        $activities = Activity::where('course_id', $id)->get();
        return $activities;
    }
}
