<?php

namespace App\Http\Controllers;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las páginas de la base de datos
        $pages = Page::all();
        // Retornar la vista con las páginas
        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retornar la vista para crear una nueva página
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'creation_date' => 'nullable|date',
            'Administrator_id' => 'required|exists:users,id', // Asegúrate de que esta tabla exista
        ]);

        // Crear una nueva página
        Page::create($request->all());
        // Redirigir a la lista de páginas con un mensaje de éxito
        return redirect()->route('pages.index')->with('success', 'Page created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        // Retornar la vista para mostrar una página específica
        return view('pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        // Retornar la vista para editar una página específica
        return view('pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
         // Validar la solicitud
         $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'creation_date' => 'nullable|date',
            'Administrator_id' => 'required|exists:users,id', // Asegúrate de que esta tabla exista
        ]);

        // Actualizar la página existente
        $page->update($request->all());
        // Redirigir a la lista de páginas con un mensaje de éxito
        return redirect()->route('pages.index')->with('success', 'Page updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        // Eliminar la página
        $page->delete();
        // Redirigir a la lista de páginas con un mensaje de éxito
        return redirect()->route('pages.index')->with('success', 'Page deleted successfully.');
    }
}
