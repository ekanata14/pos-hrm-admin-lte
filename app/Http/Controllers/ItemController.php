<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Checkout;

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
            'activePage' => 'items',
            'suppliers' => Supplier::all(),
            'items' => Item::all(),
            'totalKas' => Checkout::sum('total')
        ];

        return view('pages.admin.items.index', $viewData);
    }

    public function indexApi(){
        $data = [
            'items' => Item::orderBy('name_item', 'ASC')->get(),
        ];
        return $data['items'];
    }

    public function getByCategoryApi(string $id){
        $data = [
            'items' => Item::where('id_category', '=', $id)->get(),
        ];
        return $data['items'];
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
            'activePage' => 'items',
            'suppliers' => Supplier::all(),
            'categories' => Category::all(),
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
            'items' => Item::join('categories', 'items.id_category', '=', 'categories.id_category')->join('suppliers', 'items.id_supplier', '=', 'suppliers.id_supplier')->where('items.id_supplier', '=', $id)->get(),
       ];

        return view('pages.admin.items.items', $viewData);
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
            'item' => Item::join('categories', 'items.id_category', '=', 'categories.id_category')->join('suppliers', 'items.id_supplier', '=', 'suppliers.id_supplier')->where('items.id_item', '=', $id)->first(),
            'suppliers' => Supplier::all(),
            'categories' => Category::all(),
       ];

        return view('pages.admin.items.edit', $viewData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {   
        $validatedData = $request->validate([
            'name_item' => 'required|max:255|min:2',
            'base_price_item' => 'required',
            'sell_price_item' => 'required', 
            'id_category' => 'required',
            'id_supplier' => 'required',
        ]);

        $Item = Item::findOrFail($request->id_item);
        $Item->update($validatedData);
        
        return redirect()->route('items.show', $request->id_supplier);
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

    // API CONTROLLER
    public function getItems(){
        return response()->json(['items' => Item::orderBy('name_item', 'ASC')->get()]);
    }

    public function getItemsById(string $id){
        return response()->json(['item' => Item::where('id_item', '=', $id)->orderBy('name_item', 'ASC')->get()]);
    }

    public function getItemsBySupplier(string $id){
        $results = DB::table('items')
    ->select('items.id_item', 'items.name_item', 'items.base_price_item', 'items.sell_price_item')
    ->selectRaw('(SELECT COALESCE(SUM(item_in_outs.item_in), 0) FROM item_in_outs WHERE item_in_outs.id_item = items.id_item) - 
                 (SELECT COALESCE(SUM(item_in_outs.item_out), 0) FROM item_in_outs WHERE item_in_outs.id_item = items.id_item) AS total_stock')->where('items.id_supplier', '=', $id)->orderBy('name_item', 'ASC')
    ->get();
        return response()->json(['items' => $results]);
    }

    public function storeItemsApi(Request $request){
        $validatedData = $request->validate([
            'name_item' => 'required|max:255|min:2',
            'base_price_item' => 'required',
            'sell_price_item' => 'required', 
            'id_category' => 'required',
            'id_supplier' => 'required',
        ]);

        Item::create($validatedData);
        return response()->json(['message' => 'Items Created Successfully']);
    }
    
    public function updateItemsApi(Request $request){
        $validatedData = $request->validate([
            'name_item' => 'required|max:255|min:2',
            'base_price_item' => 'required',
            'sell_price_item' => 'required', 
            'id_category' => 'required',
            'id_supplier' => 'required',
        ]);

        $Item = Item::findOrFail($request->id_item);
        $Item->update($validatedData);
        
        return response()->json(['message' => 'Items Updated Successfully']);
    }

    public function deleteItemsApi(String $id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return response()->json(['message' => 'Items Deleted Successfully']);   
    }
}
