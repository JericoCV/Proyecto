<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Moderation;
use App\Models\Archive;
use Illuminate\Support\Facades\Storage;

class ModerationController extends Controller
{
    // Muestra la lista de archivos pendientes de moderación
    public function index()
    {
        $moderations = Moderation::with('archive', 'administrator')->where('state', 'pending')->get();
        return view('moderations.index', compact('moderations'));
    }

    // Muestra el detalle de un archivo para moderación
    public function show($id)
    {
        $moderation = Moderation::with('archive')->findOrFail($id);
        return view('moderations.show', compact('moderation'));
    }

    // Actualiza el estado de moderación
    public function update(Request $request, $id)
    {
        $moderation = Moderation::findOrFail($id);
        $archive = Archive::findOrFail($moderation->archive_id);

        // Validamos el estado que el administrador asigna
        $request->validate([
            'state' => 'required|in:approved,denied'
        ]);

        // Actualiza el estado de moderación y la visibilidad del archivo
        $moderation->state = $request->state;
        $moderation->save();

        // Si es aprobado, marca el archivo como visible para los estudiantes
        if ($moderation->state === 'approved') {
            $archive->approved = true;
            $archive->save();
        }

        // Si es denegado, elimina el archivo del almacenamiento
        if ($moderation->state === 'denied') {
            Storage::disk('public')->delete($archive->path); // Elimina el archivo del sistema
            $archive->delete(); // Elimina el registro del archivo en la base de datos
        }

        return redirect()->route('moderations.index')->with('success', 'El estado del archivo ha sido actualizado.');
    }

    // Elimina un archivo y su moderación
    public function destroy($id)
    {
        $moderation = Moderation::findOrFail($id);
        $archive = Archive::findOrFail($moderation->archive_id);

        // Elimina el archivo del almacenamiento y el registro en la base de datos
        Storage::disk('public')->delete($archive->path);
        $archive->delete();
        $moderation->delete();

        return redirect()->route('moderations.index')->with('success', 'El archivo y su moderación han sido eliminados.');
    }
}
