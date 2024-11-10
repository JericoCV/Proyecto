<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Course;

class ActivityController extends Controller
{
    // Muestra las actividades del curso al que pertenece el profesor
    public function index($course_id)
    {
        $course = Course::with('activities')->findOrFail($course_id);
        return view('activities.index', compact('course'));
    }

    // Muestra el formulario para crear una nueva actividad
    public function create($course_id)
    {
        $course = CourseController::getCourseById($course_id);
        return view('activities.create', compact('course'));
    }

    // Almacena una nueva actividad
    public function store(Request $request, $course_id)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $activity = Activity::create(['name' => $request->name, 'course_id' => $course_id]);
        GradeController::createGradeforStudentsByCourseId($course_id,$activity->id,$request->teacher_id);
        return redirect()->route('courses.myCourse', $course_id)
                         ->with('success', 'Actividad creada correctamente.');
    }

    // Edita la actividad
    public function edit($course_id,$id)
    {
        $course = CourseController::getCourseById($course_id);
        $activity = Activity::findOrFail($id);
        return view('activities.edit', compact('activity','course'));
    }

    // Actualiza la actividad
    public function update(Request $request,$course_id, $id)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $activity = Activity::findOrFail($id);
        $activity->update(['name' => $request->name]);
        return redirect()->route('courses.myCourse', $course_id)
                         ->with('success', 'Actividad actualizada correctamente.');
    }

    // Elimina la actividad
    public function destroy($course_id, $id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();
        return redirect()->route('courses.myCourse', $course_id)
                         ->with('success', 'Actividad eliminada correctamente.');
    }

    public static function getActivitieByCoursId($id){
        $activities = Activity::where('course_id',$id)->get();
        return $activities;
    }
}
