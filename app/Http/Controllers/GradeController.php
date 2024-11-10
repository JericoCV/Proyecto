<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Activity;
use App\Models\Student;

class GradeController extends Controller
{
    // Muestra todos los estudiantes con sus calificaciones en una actividad
    public function show($course_id, $activity_id)
    {
        $course = CourseController::getCourseById($course_id);
        $activity = Activity::findOrFail($activity_id);
        $students = Student::with(['grades' => function ($query) use ($activity) {
            $query->where('activity_id', $activity->id);
        }])->where('course_id', $activity->course_id)->get();
        return view('activities.show', compact('activity', 'students', 'course'));
    }

    // Actualiza la calificación de un estudiante
    public function update(Request $request, $course_id, $activity_id)
    {
        foreach ($request->grades as $student_id => $data) {
            $student = Student::findOrFail($student_id);

            // Si existe un grade_id, actualiza la calificación; si no, crea una nueva
            $grade = $student->grades()->where('activity_id', $activity_id)->first();

            if ($grade) {
                // Actualiza la calificación existente
                $grade->update([
                    'grade' => $data['grade'],
                    'comment' => $data['comment']
                ]);
            } else {
                // Crea una nueva calificación si no existe
                $student->grades()->create([
                    'activity_id' => $activity_id,
                    'grade' => $data['grade'],
                    'comment' => $data['comment'],
                    'teacher_id'=> $data['teacher-id']
                ]);
            }
        }

        return redirect()->route('activities.grades.show', [$course_id, $activity_id])->with('success', 'Calificaciones actualizadas con éxito.');
    }

    public static function createGradeforStudentsByCourseId($course_id, $activity_id, $teacher_id)
    {
        $students = Student::where('course_id', $course_id)->get();
        foreach ($students as $student) {
            Grade::create([
                'activity_id' => $activity_id, 
                'student_id' => $student->id,
                'teacher_id' => $teacher_id,
                'grade' => 0, 
                'comment' => "Ninguno"
            ]);
        }
    }
}
