<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = [
            'title' => "HRM System",
            'path' => "Category",
            'dir' => "All categories",
            'activePage' => 'category',
            'categories' => Category::all(),
        ];

        return view('pages.admin.categories.index', $viewData);
        // return view("pages.categories.management-supplier", [
            // 'categoriesWithRoles' => DB::table('users')->join('roles', 'users.id_role', '=', 'roles.id_role')->select('users.*', 'roles.name_role as name_role')->get()
        // ]);
    }

    public function indexApi(){
        $data = [
            'categories' => Category::all()
        ];

        return $data['categories'];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $viewData = [
            'title' => "HRM System",
            'path' => "Category",
            'dir' => "Create Category",
            'activePage' => 'category',
        ];

        return view('pages.admin.categories.create', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'name_category' => 'required|max:255|min:2',
        ]);

        Category::create($validatedData);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { 
        $viewData = [
            'title' => "HRM System",
            'path' => "Category",
            'dir' => "Edit categorie",
            'activePage' => 'category',
            'category' => Category::findOrFail($id),
       ];

        return view('pages.admin.categories.edit', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $viewData = [
            'title' => "HRM System",
            'path' => "Category",
            'dir' => "Edit Category",
            'activePage' => 'category',
            'category' => Category::findOrFail($id)
       ];

        return view('pages.admin.categories.edit', $viewData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        
        $validatedData = $request->validate([
            'name_categorie' => 'required|max:255|min:2',
            'phone_number_categorie' => 'required|min:2',
        ]);

        $categorie = Category::findOrFail($request->id_supplier);
        $categorie->update($validatedData);
        
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $categorie = Category::findOrFail($request->id_category);
        $categorie->delete();
        return redirect('/category');   
    }
}
