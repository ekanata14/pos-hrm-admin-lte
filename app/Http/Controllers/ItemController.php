<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = [
            'title' => "HRM System",
            'path' => "Item",
            'dir' => "All items",
            'activePage' => 'category',
            'items' => Item::all(),
        ];

        return view('pages.admin.items.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $viewData = [
            'title' => "HRM System",
            'path' => "Item",
            'dir' => "Create Item",
            'activePage' => 'category',
        ];

        return view('pages.admin.items.create', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'name_item' => 'required|max:255|min:2',
            'base_price_item' => 'required',
            'sell_price_item' => 'required', 
            'id_category' => 'required',
            'id_supplier' => 'required',
            'item_date' => 'required',
        ]);

        Item::create($validatedData);
        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { 
        $viewData = [
            'title' => "HRM System",
            'path' => "Item",
            'dir' => "Edit Item",
            'activePage' => 'category',
            'item' => Item::findOrFail($id),
       ];

        return view('pages.admin.items.edit', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $viewData = [
            'title' => "HRM System",
            'path' => "Item",
            'dir' => "Edit Item",
            'activePage' => 'category',
            'category' => Item::findOrFail($id)
       ];

        return view('pages.admin.items.edit', $viewData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $itemk)
    {
        
        $validatedData = $request->validate([
            'name_item' => 'required|max:255|min:2',
            'base_price_item' => 'required',
            'sell_price_item' => 'required', 
            'id_category' => 'required',
            'id_supplier' => 'required',
            'item_date' => 'required',
        ]);

        $Item = Item::findOrFail($request->id_item);
        $Item->update($validatedData);
        
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $Item = Item::findOrFail($request->id_item);
        $Item->delete();
        return redirect('/category');   
    }
}
