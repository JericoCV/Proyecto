<?php
namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\ItemController;

class MenuController extends Controller
{
    public function index($page_id)
    {
        // Obtener la página con sus menús
        $page = Page::with('menus')->findOrFail($page_id);
        $menu = $page->menus;

        return view('menus.index', compact('page', 'menu'));
    }

    public function create($page_id)
    {
        return view('menus.create', compact('page_id'));
    }

    public function store(Request $request, $page_id)
    {
        // Validación de menú y al menos un item
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|integer',
            'page_id' => 'required|integer',
            'items' => 'required|array|min:1',
            'items.*.text' => 'required|string',
            'items.*.link' => 'required|url'
        ]);

        // Crear el menú
        $menu = Menu::create([
            'name' => $request->name,
            'position' => $request->position,
            'page_id' => $request->page_id,
        ]);

        // Crear los ítems relacionados
        foreach ($request->items as $itemData) {
            $newitem = new ItemController;
            $newitem->store($itemData,$menu->id);
        }

        return redirect()->route('pages.menus.index',$page_id)->with('success', 'Menu and items created successfully!');
    }

    public function edit($page_id,$id)
    {
        // Cargar el menú con sus ítems
        $menu = Menu::with('items')->findOrFail($id);
        return view('menus.edit', compact('menu', 'page_id'));
    }

    public function update(Request $request, $page_id, $id)
    {
        // Validación de los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|integer',
            'page_id' => 'required|integer',
            'items' => 'required|array|min:1',
            'items.*.text' => 'required|string',
            'items.*.link' => 'required|url'
        ]);

        // Actualizar el menú
        $menu = Menu::findOrFail($id);
        $menu->update([
            'name' => $request->name,
            'position' => $request->position,
            'page_id' => $request->page_id,
        ]);

        // Eliminar los ítems existentes y crear los nuevos
        $menu->items()->delete();
        foreach ($request->items as $itemData) {
            $newitem = new ItemController;
            $newitem->store($itemData,$menu->id);
        }

        return redirect()->route('pages.menus.index',$page_id)->with('success', 'Menu and items updated successfully!');
    }

    public function destroy($page_id,$id)
    {
        // Eliminar el menú y sus ítems
        $menu = Menu::findOrFail($id);
        $menu->items()->delete();
        $menu->delete();

        return redirect()->route('pages.menus.index',$page_id)->with('success', 'Menu deleted successfully!');
    }

    public static function getMenuAndElementsByPageId($id){
        $menu = Menu::with(['items' => function ($query) {
            $query->orderBy('order', 'asc');
        }])->where('page_id',$id)->first();
        return $menu;
    }
}
