<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = [
            'title' => "HRM System",
            'path' => "Checkout",
            'dir' => "All checkouts",
            'activePage' => 'checkout',
            'checkouts' => Checkout::all(),
        ];

        return view('pages.admin.checkouts.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $viewData = [
            'title' => "HRM System",
            'path' => "Checkout",
            'dir' => "Create Checkout",
            'activePage' => 'checkout',
        ];

        return view('pages.admin.checkouts.create', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'id_cart' => 'required',
            'total' => 'required',
            'payment_method' => 'required',
            'id_user' => 'required',
            'date_checkout' => 'required',
        ]);

        Checkout::create($validatedData);
        return redirect()->route('checkouts.index');
    }

    public function storeApi(Request $request)
    { 
        $validatedData = $request->validate([
            'id_cart' => 'required',
            'total' => 'required',
            'payment_method' => 'required',
            'id_user' => 'required',
            'date_checkout' => 'required',
        ]);
        $cart = Cart::findOrFail($request->id_cart);
        $cart->update(['is_checked_out' => '1']);
        Checkout::create($validatedData);
        return response()->json(['message' => "Checked Out Successfully"]);
    }

    public function checkOutLeaderBoard(){
        $leaderboard = DB::table('checkouts')
    ->leftJoin('users', 'checkouts.id_user', '=', 'users.id_user')
    ->select('users.username', DB::raw('COUNT(checkouts.id_checkout) AS total_transaction'))
    ->groupBy('users.id_user')
    ->orderBy('total_transaction', 'DESC')
    ->get();
        return $leaderboard;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { 
        $viewData = [
            'title' => "HRM System",
            'path' => "Checkout",
            'dir' => "Edit Checkout",
            'activePage' => 'checkout',
            'item' => Checkout::findOrFail($id),
       ];

        return view('pages.admin.checkouts.edit', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $viewData = [
            'title' => "HRM System",
            'path' => "Checkout",
            'dir' => "Edit Checkout",
            'activePage' => 'checkout',
            'category' => Checkout::findOrFail($id)
       ];

        return view('pages.admin.checkouts.edit', $viewData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checkout $itemk)
    {
        $validatedData = $request->validate([
            'id_cart' => 'required',
            'total' => 'required',
            'payment_method' => 'required',
            'id_user' => 'required',
            'date_checkout' => 'required',
        ]);

        $checkout = Checkout::findOrFail($request->id_item);
        $checkout->update($validatedData);
        
        return redirect()->route('checkouts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $checkout = Checkout::findOrFail($request->id_item);
        $checkout->delete();
        return redirect('/category');   
    }
}
