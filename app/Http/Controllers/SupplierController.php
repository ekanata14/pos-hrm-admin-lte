<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Checkout;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = [
            'title' => "HRM System",
            'path' => "suppliers",
            'dir' => "All suppliers",
            'activePage' => 'supplier',
            'suppliers' => Supplier::all(),
            'totalKas' => Checkout::sum('total')
        ];

        return view('pages.admin.suppliers.index', $viewData);
        // return view("pages.suppliers.management-supplier", [
            // 'suppliersWithRoles' => DB::table('users')->join('roles', 'users.id_role', '=', 'roles.id_role')->select('users.*', 'roles.name_role as name_role')->get()
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $viewData = [
            'title' => "HRM System",
            'path' => "suppliers",
            'dir' => "Create supplier",
            'activePage' => 'supplier',
        ];

        return view('pages.admin.suppliers.create', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'name_supplier' => 'required|max:255|min:2',
            'phone_number_supplier' => 'required|min:2',
        ]);

        Supplier::create($validatedData);
        return redirect()->route('suppliers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { 
        $viewData = [
            'title' => "HRM System",
            'path' => "Suppliers",
            'dir' => "Edit Supplier",
            'activePage' => 'supplier',
            'Supplier' => Supplier::findOrFail($id),
       ];

        return view('pages.admin.suppliers.edit', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $viewData = [
            'title' => "HRM System",
            'path' => "Suppliers",
            'dir' => "Edit Supplier",
            'activePage' => 'Supplier',
            'supplier' => Supplier::findOrFail($id)
       ];

        return view('pages.admin.suppliers.edit', $viewData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        
        $validatedData = $request->validate([
            'name_supplier' => 'required|max:255|min:2',
            'phone_number_supplier' => 'required|min:2',
        ]);

        $supplier = Supplier::findOrFail($request->id_supplier);
        $supplier->update($validatedData);
        
        return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $supplier = Supplier::findOrFail($request->id_supplier);
        $supplier->delete();
        return redirect('/supplier');   
    }

    // API CONTROLLER
    public function getSupplier(){
        return response()->json(['suppliers' => Supplier::all()]);
    }

    public function getSupplierById(string $id){
        return response()->json(['supplier' => Supplier::where('id_supplier', '=', $id)->first()]);
    }

    public function storeSupplierApi(Request $request){
        $validatedData = $request->validate([
            'name_supplier' => 'required|max:255|min:2',
            'phone_number_supplier' => 'required|min:2',
        ]);

        Supplier::create($validatedData);
        return response()->json(['message' => 'Supplier Created Successfully']);
    }
    
    public function updateSupplierApi(Request $request){
        $validatedData = $request->validate([
            'name_supplier' => 'required|max:255|min:2',
            'phone_number_supplier' => 'required|min:2',
        ]); 

        $supplier = Supplier::findOrFail($request->id_supplier);
        $supplier->update($validatedData);
        
        return response()->json(['message' => 'Supplier Updated Successfully']);
    }

    public function deleteSupplierApi(String $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return response()->json(['message' => 'Supplier Deleted Successfully']);   
    }






}
