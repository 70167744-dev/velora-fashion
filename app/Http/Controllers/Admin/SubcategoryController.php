<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::with('category')->get();

        return view('admin.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
        ]);

        Subcategory::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
        ]);

        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory added successfully!');
    }

    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();

        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
        ]);

        $subcategory->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
        ]);

        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory updated successfully!');
    }

    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();

        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory deleted successfully!');
    }
}
