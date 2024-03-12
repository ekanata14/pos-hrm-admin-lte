<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Item;
use App\Models\ItemInOut;
use App\Models\Checkout;
use App\Models\Supplier;
use App\Models\Category;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $viewData = [
            'title' => "HRM System",
            'path' => "POS",
            'dir' => "All Pos",
            'activePage' => 'pos',
            'items' => Item::all(),
            'inouts' => ItemInOut::all(),
            'categories' => Category::all(),
            'totalKas' => Checkout::sum('total')
        ];

        return view('pages.admin.pos.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { 
        $viewData = [
            'title' => "HRM System",
            'path' => "POS",
            'dir' => "All pos",
            'activePage' => 'pos',
            'items' => Item::where('id_category', '=', $id)->get(),
        ];

        return view('pages.admin.pos.items', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
