<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = [
            'title' => "HRM System",
            'path' => "Cart",
            'dir' => "All carts",
            'activePage' => 'cart',
            'carts' => Cart::all(),
        ];

        return view('pages.admin.carts.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $viewData = [
            'title' => "HRM System",
            'path' => "Cart",
            'dir' => "Create Cart",
            'activePage' => 'cart',
        ];

        return view('pages.admin.carts.create', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'id_user' => 'required',
        ]);

        Cart::create($validatedData);
        return redirect()->route('carts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { 
        $viewData = [
            'title' => "HRM System",
            'path' => "Cart",
            'dir' => "Edit Cart",
            'activePage' => 'cart',
            'cart' => Cart::findOrFail($id),
       ];

        return view('pages.admin.carts.edit', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $viewData = [
            'title' => "HRM System",
            'path' => "Cart",
            'dir' => "Edit Cart",
            'activePage' => 'cart',
            'cart' => Cart::findOrFail($id)
       ];

        return view('pages.admin.carts.edit', $viewData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        
        $validatedData = $request->validate([
            'name_item' => 'required|max:255|min:2',
            'base_price_item' => 'required',
            'sell_price_item' => 'required', 
            'id_category' => 'required',
            'id_supplier' => 'required',
            'item_date' => 'required',
        ]);

        $Cart = Cart::findOrFail($request->id_item);
        $Cart->update($validatedData);
        
        return redirect()->route('carts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $Cart = Cart::findOrFail($request->id_item);
        $Cart->delete();
        return redirect('/cart');   
    }
}
