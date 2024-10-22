<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Menu;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function store($itemData, $menu_id)
    {
        // Crear un nuevo ítem
        Item::create([
            'text' => $itemData['text'],
            'link' => $itemData['link'],
            'order' => $itemData['order'] ?? 0, // Si no se envía un orden, usar 0
            'menu_id' => $menu_id
        ]);
    }
    public function destroy($page_id, $menu_id, $id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('pages.menus.index', [$page_id, $menu_id])->with('success', 'Item deleted successfully!');
    }
}
