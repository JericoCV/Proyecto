<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archive;
use App\Models\Moderation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

class ArchiveController extends Controller
{
    // Muestra la lista de archivos del curso específico
    public function index($course_id)
    {
        // Solo permite a los estudiantes y profesores ver los archivos de su curso
        $user = Auth::user();
        $role = UserController::getUserRole($user->id);
        if ($role === 'Estudiante') {
            $archives = Archive::where('course_id', $course_id)
                                ->where('approved', true)
                                ->get();
        } elseif ($role === 'Administrator'|| $role === 'Docente') {
            // El administrador ve todos los archivos, incluidos los no aprobados
            $archives = Archive::where('course_id', $course_id)->get();
        } else {
            abort(403, 'Unauthorized access.');
        }

        return view('courses.show', compact('archives', 'course_id'));
    }

    // Muestra el formulario para subir un nuevo archivo
    public function create($course_id)
    {
        return view('archives.create', compact('course_id'));
    }

    // Almacena un archivo PDF subido
    public function store(Request $request, $course_id)
{
    // Validación del archivo PDF
    $validated = $request->validate([
        'file' => 'required|mimes:pdf|max:2048', // Solo PDF y tamaño máximo de 2 MB
        'name' => 'required|string|max:255',
    ]);

    // Obtener usuario y determinar carpeta de almacenamiento según el rol
    $user = Auth::user();
    $role = UserController::getUserRole($user->id);
    $path = null;
    if ($role === 'Docente') {
        $path = "courses/$course_id/teachers";
    } elseif ($role === 'Administrator') {
        $path = "courses/$course_id/administrators";
    }

    // Subir archivo PDF al disco 'public'
    $filePath = $request->file('file')->store($path, 'public');

    // Crear el registro del archivo en la base de datos
    $archive = Archive::create([
        'name' => $validated['name'],
        'path' => $filePath,
        'mail' => $user->email,
        'upload_date' => now(),
        'course_id' => $course_id,
        'approved' => $role === 'Administrator' ? true : false, // Se aprueba automáticamente si lo sube un administrador
    ]);

    // Crear un registro de moderación si el archivo no está aprobado
    if (!$archive->approved) {
        Moderation::create([
            'archive_id' => $archive->id,
            'state' => 'pending',
            'administrator_id' => null, // Administrador aún no asignado
        ]);
    }

    return redirect()->route('courses.archives.index', $course_id)
                     ->with('success', '¡Archivo subido exitosamente!');
}

    // Elimina un archivo
    public function destroy($course_id, $id)
    {
        $archive = Archive::findOrFail($id);

        // Eliminar el archivo del sistema de archivos
        if (Storage::disk('public')->exists($archive->path)) {
            Storage::disk('public')->delete($archive->path);
        }

        // Eliminar el registro de la base de datos
        $archive->delete();

        return redirect()->route('courses.archives.index', $course_id)
                         ->with('success', 'Archivo eliminado correctamente!');
    }

    public static function getArchivesByCourseId($course_id){
        $archives = Archive::where('course_id', $course_id)->get();
        return $archives;
    }

    public static function getArchivesByCourseIdForStudents($course_id){
        $archives = Archive::where('course_id', $course_id)->where('approved', true)->get();
        return $archives;
    }


    
}
