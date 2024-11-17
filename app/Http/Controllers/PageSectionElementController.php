<?php

namespace App\Http\Controllers;

use App\Models\Element;
use Illuminate\Http\Request;

class PageSectionElementController extends Controller
{
    // Función para actualizar el orden de los elementos
    public function updateOrder(Request $request, $sectionId, $elementId)
    {
        // Verificar que se haya recibido un orden válido
        $validated = $request->validate([
            'order' => 'required|integer|min:0',
        ]);

        // Obtener el elemento correspondiente
        $element = Element::where('section_id', $sectionId)
            ->where('id', $elementId)
            ->first();

        if ($element) {
            // Actualizar el orden del elemento
            $element->order = $validated['order'];
            $element->save();
            // Obtener todos los elementos de la sección ordenados
            $elements = Element::where('section_id', $sectionId)->orderBy('order')->get();

            return response()->json([
                'message' => 'Order updated successfully.',
                'elements' => $elements
            ]);
        } else {
            return response()->json(['message' => 'Element not found.'], 404);
        }
    }
}
