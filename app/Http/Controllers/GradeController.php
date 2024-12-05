<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Activity;
use App\Models\Student;
use App\Models\Course;
use Barryvdh\DomPDF\Facade\Pdf;

class GradeController extends Controller
{
    // Muestra todos los estudiantes con sus calificaciones en una actividad
    public function show($course_id, $month)
    {
        // Obtener el curso y actividades del mes
        $course = Course::with(['activities' => function ($query) use ($month) {
            $query->where('month', $month);
        }])->findOrFail($course_id);

        // Verificar que existan 4 actividades para el mes
        if ($course->activities->count() !== 4) {
            return redirect()->route('courses.myCourse', $course_id)
                ->withErrors('Debe haber exactamente 4 actividades creadas para este mes.');
        }

        // Obtener los estudiantes inscritos en el curso
        $students = Student::where('course_id', $course_id)->get();

        // Obtener las calificaciones y estructurarlas
        $grades = Grade::whereIn('activity_id', $course->activities->pluck('id'))
            ->get()
            ->groupBy('student_id')
            ->map(function ($grades) {
                return $grades->keyBy('activity_id');
            });

        return view('activities.show', compact('grades', 'students', 'course', 'month'));
    }

    public function grades_show($course_id, $month)
    {
        // Obtener el curso y actividades del mes
        $course = Course::with(['activities' => function ($query) use ($month) {
            $query->where('month', $month);
        }])->findOrFail($course_id);

        // Verificar que existan 4 actividades para el mes
        if ($course->activities->count() !== 4) {
            return redirect()->route('courses.myCourse', $course_id)
                ->withErrors('Debe haber exactamente 4 actividades creadas para este mes.');
        }

        // Obtener los estudiantes inscritos en el curso
        $students = Student::where('course_id', $course_id)->get();

        // Obtener las calificaciones y estructurarlas
        $grades = Grade::whereIn('activity_id', $course->activities->pluck('id'))
            ->get()
            ->groupBy('student_id')
            ->map(function ($grades) {
                return $grades->keyBy('activity_id');
            });

        return view('activities.pdfshow', compact('grades', 'students', 'course', 'month'));
    }

    // Actualiza la calificación de un estudiante
    public function update(Request $request, $course_id, $month)
    {
        $request->validate([
            'grades' => 'required|array',
            'grades.*.*.grade' => 'nullable|numeric|min:0|max:100',
            'grades.*.*.comment' => 'nullable|string|max:255',
        ]);

        foreach ($request->grades as $student_id => $activities) {
            foreach ($activities as $activity_id => $data) {
                Grade::updateOrCreate(
                    [
                        'student_id' => $student_id,
                        'activity_id' => $activity_id,
                    ],
                    [
                        'grade' => $data['grade'],
                        'comment' => $data['comment'],
                    ]
                );
            }
        }

        return redirect()->route('activities.grades.show', [$course_id, $month])
            ->with('success', 'Calificaciones actualizadas con éxito.');
    }

    public function generatePdfForStudent(Request $request, $courseId, $studentId)
    {
        $course = Course::findOrFail($courseId);
        $student = Student::findOrFail($studentId);
        $grades = $request->input('grades', []);

        // Formatear las calificaciones para la vista y calcular el promedio
        $formattedGrades = [];
        $totalGrades = 0;
        $gradeCount = 0;

        // Mapeo de meses en español a inglés
        $monthsMap = [
            'Enero' => 'January',
            'Febrero' => 'February',
            'Marzo' => 'March',
            'Abril' => 'April',
            'Mayo' => 'May',
            'Junio' => 'June',
            'Julio' => 'July',
            'Agosto' => 'August',
            'Septiembre' => 'September',
            'Octubre' => 'October',
            'Noviembre' => 'November',
            'Diciembre' => 'December',
        ];

        // Obtener el mes de la primera actividad (si existe)
        $month = null;
        foreach ($grades as $activityId => $data) {
            $activity = Activity::findOrFail($activityId);
            $gradeValue = $data['grade'] ?? null;

            // Si aún no se ha asignado el mes, tomamos el de la primera actividad
            if (!$month && isset($activity->month)) {
                // Convertir el mes de español a inglés
                $month = $monthsMap[$activity->month] ?? null;
            }

            // Agregar a la lista de calificaciones formateadas
            $formattedGrades[] = [
                'activity' => $activity->name,
                'grade' => $gradeValue ?? 'N/A',
                'comment' => $data['comment'] ?? 'Sin comentario',
            ];

            // Sumar al promedio solo si la calificación es válida
            if (is_numeric($gradeValue)) {
                $totalGrades += $gradeValue;
                $gradeCount++;
            }
        }

        // Calcular el promedio
        $average = $gradeCount > 0 ? round($totalGrades / $gradeCount, 2) : 'N/A';

        $passClass = round($average) > 79 ? 'pass' : 'fail';
        $failClass = round($average) > 79 ? 'fail' : 'pass';

        // Pasar el mes en inglés con la primera letra en mayúscula
        $month = ucfirst(strtolower($month));

        // Generar el PDF
        $pdf = Pdf::loadView('activities.pdf', compact('student', 'course', 'formattedGrades', 'average', 'passClass', 'failClass', 'month'));
        return $pdf->stream("Calificaciones_{$student->id}.pdf");
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
