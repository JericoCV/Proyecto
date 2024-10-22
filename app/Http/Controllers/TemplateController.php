<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Section;
use App\Models\Template;

class TemplateController extends Controller
{
    public function addTemplateToPage(Request $request, $page_id)
    {
        $page = Page::findOrFail($page_id);
        $template = Template::findOrFail($request->template_id);
        switch ($template->name) {
            case 'Comunicados':
                $this->createComunicadoSections($page);
                break;
            case 'Noticias':
                $this->createNoticiasSections($page);
                break;
            case 'Galerías':
                $this->createGaleriaSections($page);
                break;
        }

        return redirect()->route('pages.show', $page_id)->with('success', 'Template added to the page successfully!');
    }

    private function createComunicadoSections(Page $page)
    {
        // Crear una sección de texto para comunicados
        Section::create([
            'title' => 'Comunicado',
            'order' => Section::where('page_id', $page->id)->max('order') + 1,
            'page_id' => $page->id,
        ]);

        // Crear un menú para comunicados
        Section::create([
            'title' => 'Enlaces del Comunicado',
            'order' => Section::where('page_id', $page->id)->max('order') + 1,
            'page_id' => $page->id,
        ]);
    }

    private function createNoticiasSections(Page $page)
    {
        // Crear una sección de texto para noticias
        Section::create([
            'title' => 'Noticia',
            'order' => Section::where('page_id', $page->id)->max('order') + 1,
            'page_id' => $page->id,
        ]);

        // Crear una sección de imagen para noticias
        Section::create([
            'title' => 'Imagen de la Noticia',
            'order' => Section::where('page_id', $page->id)->max('order') + 1,
            'page_id' => $page->id,
        ]);
    }

    private function createGaleriaSections(Page $page)
    {
        // Crear una sección para la galería de imágenes
        Section::create([
            'title' => 'Galería de Imágenes',
            'order' => Section::where('page_id', $page->id)->max('order') + 1,
            'page_id' => $page->id,
        ]);
    }
    
    public static function getAllTemplates()
    {
        return Template::all();
    }
}

