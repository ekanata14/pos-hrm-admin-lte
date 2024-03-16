<?php

namespace App\Http\Controllers;

use App\Models\ItemInOut;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Checkout;

class ItemInOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = [
            'title' => "HRM System",
            'path' => "Item In Out",
            'dir' => "All item in out",
            'activePage' => 'inout',
            'inouts' => ItemInOut::all(),
            'totalKas' => Checkout::sum('total')
        ];

        return view('pages.admin.inouts.index', $viewData);
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
            'activePage' => 'inout',
        ];

        return view('pages.admin.inouts.create', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_cart' => 'required',
            'id_item' => 'required',
            'item_in' => 'required',
            'item_out' => 'required',
            'id_user' => 'required',
            'item_date' => 'required',
        ]);

        ItemInOut::create($validatedData);
        return redirect()->route('inouts.index');
    }

    public function storeApi(Request $request)
    {
        $validatedData = $request->validate([
            'id_cart' => '',
            'id_item' => 'required',
            'item_in' => 'required',
            'item_out' => 'required',
            'id_user' => 'required',
            'item_date' => 'required',
        ]);

        ItemInOut::create($validatedData);
        return response()->json(['message' => "Item added successfully"]);
    }

    public function findByCart(string $id)
    {
        $itemsByCart = ItemInOut::leftjoin('items', 'item_in_outs.id_item', '=', 'items.id_item')->where('id_cart', '=', $id)->get();
        return response()->json($itemsByCart);
    }

    public function historyPerDay(string $date)
    {
    $results = DB::table('items')
        ->leftJoin(DB::raw('(SELECT id_item, id_user, item_date, SUM(item_out) AS item_out 
                             FROM item_in_outs 
                             WHERE DATE(item_date) = ? 
                             GROUP BY id_item, id_user, item_date) AS item_in_outs'), function($join) {
            $join->on('items.id_item', '=', 'item_in_outs.id_item');
        })
        ->select('items.*', DB::raw('COALESCE(SUM(item_in_outs.item_out), 0) AS total_item_out'))
        ->groupBy('items.id_item')
        ->havingRaw('total_item_out > 0')
        ->setBindings([$date]) // Mengikat nilai tanggal dari parameter fungsi
        ->get();

    return response()->json($results);

    }

    public function totalAll()
    {
        $totalPenjualan = DB::table('items')
    ->leftJoin(DB::raw('(SELECT id_item, SUM(item_out) AS total_item_out FROM item_in_outs GROUP BY id_item) AS item_in_outs'), 'items.id_item', '=', 'item_in_outs.id_item')
    ->selectRaw('SUM(COALESCE(item_in_outs.total_item_out, 0) * items.sell_price_item) AS total_penjualan_all')
    ->whereNotNull('items.sell_price_item')
    ->first();

    $totalAll = $totalPenjualan->total_penjualan_all;
        return response()->json($totalAll);

    }

    public function totalPerDay(string $date)
    {
        // Query menggunakan parameter binding
        $total = DB::table('items')
            ->leftJoin(DB::raw('(SELECT id_item, SUM(item_out) AS total_item_out FROM item_in_outs WHERE DATE(item_date) = ? GROUP BY id_item) AS item_in_outs'), 'items.id_item', '=', 'item_in_outs.id_item')
            ->selectRaw('SUM(COALESCE(item_in_outs.total_item_out, 0) * items.sell_price_item) AS total_penjualan_by_date', [$date])
            ->whereNotNull('items.sell_price_item')
            ->first();

        $totalPerDay = $total->total_penjualan_by_date;


        return response()->json($totalPerDay);
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
            'activePage' => 'inout',
            'item' => ItemInOut::findOrFail($id),
        ];

        return view('pages.admin.inouts.edit', $viewData);
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
            'activePage' => 'inout',
            'inout' => ItemInOut::findOrFail($id)
        ];

        return view('pages.admin.inouts.edit', $viewData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemInOut $itemInOut)
    {
        $validatedData = $request->validate([
            'id_item_in_out' => 'required',
            'id_cart' => 'required',
            'id_item' => 'required',
            'item_in' => 'required',
            'item_out' => 'required',
            'id_user' => 'required',
            'item_date' => 'required',
        ]);

        $item = ItemInOut::findOrFail($request->id_item_in_out);
        $item->update($validatedData);

        return redirect()->route('inouts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $item = ItemInOut::findOrFail($request->id_item_in_out);
        $item->delete();
        return redirect('/inout');
    }

    public function destroyApi(string $id)
    {
        $item = ItemInOut::findOrFail($id);
        $item->delete();
        return response()->json(['message' => 'Item Deleted Successfully']);
    }
}
