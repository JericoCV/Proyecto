<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    public function index($page_id)
    {
        $sections = Section::where('page_id', $page_id)->get();
        return view('sections.index', compact('sections', 'page_id'));
    }

    public function create($page_id)
    {
        return view('sections.create', compact('page_id'));
    }

    public function ShowElements($page_id, Section $section){
        $elements = ElementController::ShowBySectionId($section->id);
        $section_id = $section->id;
        return view('sections.manage-elements',compact('elements','section_id','page_id'));
    }

    public function store(Request $request, $page_id)
    {
        Section::create([
            'title' => $request->title,
            'order' => Section::where('page_id', $page_id)->max('order') + 1,
            'page_id' => $page_id
        ]);

        return redirect()->route('pages.sections.index', $page_id)->with('success', 'Section created successfully!');
    }

    public function edit($page_id, $id)
    {
        $section = Section::findOrFail($id);
        return view('sections.edit', compact('section','page_id'));
    }

    public function update(Request $request,$page_id, $id)
    {
        $section = Section::findOrFail($id);
        $section->update($request->only(['title']));
        $section->update($request->only(['order']));

        return redirect()->route('pages.sections.index', $page_id)->with('success', 'Section updated successfully!');
    }

    public function destroy($page_id, $id)
    {
        $section = Section::findOrFail($id);
        foreach ($section->elements as $element) {
            // Si el elemento tiene una imagen, eliminarla del disco
            ElementController::destroyElementbyId($element->id);
        }
        $section->delete();

        return redirect()->route('pages.sections.index', $page_id)->with('success', 'Section deleted successfully!');
    }

    public static function destroySectionbyId($id){
        $section = Section::findOrFail($id);
        foreach ($section->elements as $element) {
            // Si el elemento tiene una imagen, eliminarla del disco
            ElementController::destroyElementbyId($element->id);
        }
        $section->delete();
    }

    public static function getSectionAndElementsByPageId($id){
        $section = Section::with(['elements' => function ($query) {
            $query->orderBy('order', 'asc');
        }])->where('page_id',$id)->get();
        return $section;
    }
}

