<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Element;
use Illuminate\Support\Facades\Storage;

class ElementController extends Controller
{
    public function index($page_id, $section_id)
    {
        $elements = Element::where('section_id', $section_id)->orderBy('order')->get();
        return view('elements.index', compact('elements', 'section_id', 'page_id'));
    }

    public static function ShowBySectionId($section_id)
    {
        $elements = Element::where('section_id', $section_id)->orderBy('order')->get();
        return $elements;
    }

    public function create($page_id, $section_id)
    {
        return view('elements.create', compact('section_id', 'page_id'));
    }

    public function store(Request $request, $page_id, $section_id)
    {
        try {
            // Validar los datos
            $validated = $request->validate([
                'type' => 'required|string|max:255',
                'content' => 'required_if:type,text|nullable|string', // El contenido es obligatorio solo si es de tipo texto
                'alt_text' => 'required_if:type,image|nullable|string', // El contenido es obligatorio solo si es de tipo image
                'style' => 'nullable|string', // Asegurar que el estilo sea un JSON válido
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validación para imágenes
            ]);

            // Si se subió una imagen, guárdala y obtén la ruta
            $imagePath = 'none';
            $alt_text = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public'); // Guardar la imagen en el disco 'public'
                $alt_text = $validated['alt_text'];
            } else {
                $alt_text = $validated['content'];
            }
            // Convertir el campo 'style' a JSON si no está vacío
            $style = !empty($validated['style']) ? json_encode(['style' => $validated['style']]) : json_encode([]);
            // Crear el nuevo elemento
            Element::create([
                'type' => $validated['type'],
                'content' => $alt_text,
                'style' => $style,
                'image_path' => $imagePath, // Guardar la ruta de la imagen
                'order' => Element::where('section_id', $section_id)->max('order') + 1,
                'section_id' => $section_id
            ]);

            return redirect()->route('pages.sections.manageElements', [$page_id, $section_id])
                ->with('success', 'Element created successfully!');
        } catch (\Exception $e) {
            // Manejar el error y redirigir con un mensaje de error
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()])
                ->withInput(); // Mantener la entrada del formulario
        }
    }


    public function edit($page_id, $section_id, $id)
    {
        $element = Element::findOrFail($id);
        return view('elements.edit', compact('element', 'page_id', 'section_id'));
    }

    public function update(Request $request, $page_id, $section_id, $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'content' => 'required_if:type,text|string',
            'style' => 'nullable|json',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validación para imágenes
        ]);

        // Buscar el elemento
        $element = Element::findOrFail($id);

        // Si se subió una nueva imagen, borrar la anterior y guardar la nueva
        if ($request->hasFile('image')) {
            if ($element->image_path) {
                Storage::disk('public')->delete($element->image_path); // Eliminar la imagen anterior
            }
            $imagePath = $request->file('image')->store('images', 'public'); // Guardar la nueva imagen
        } else {
            $imagePath = $element->image_path; // Mantener la imagen existente
        }

        // Actualizar el elemento
        $element->update([
            'type' => $validated['type'],
            'content' => $validated['content'],
            'style' => $validated['style'] ?? json_encode([]),
            'image_path' => $imagePath, // Actualizar la ruta de la imagen
        ]);

        return redirect()->route('pages.sections.manageElements', [$page_id, $section_id])->with('success', 'Element updated successfully!');
    }

    public function destroy($page_id, $section_id, $id)
    {
        // Encontrar el elemento por su ID
        $element = Element::findOrFail($id);

        // Si el elemento tiene una imagen asociada, eliminar el archivo de la imagen del sistema de archivos
        if ($element->image_path) {
            Storage::disk('public')->delete($element->image_path); // Eliminar la imagen del disco
        }

        // Eliminar el elemento de la base de datos
        $element->delete();

        // Redirigir de vuelta a la página de la sección con un mensaje de éxito
        return redirect()->route('pages.sections.manageElements', [$page_id, $section_id])->with('success', 'Element deleted successfully!');
    }
    public static function destroyElementbyId($id){
        $element = Element::findOrFail($id);
        if ($element->image_path) {
            Storage::disk('public')->delete($element->image_path); // Eliminar la imagen del disco
        }
        $element->delete();
    }
}
