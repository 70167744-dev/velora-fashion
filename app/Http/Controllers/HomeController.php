<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->take(8)->get();
        $categories = Category::all();

        return view('home', compact('products', 'categories'));
    }

    public function products(\Illuminate\Http\Request $request)
    {
        $categories = Category::with('subcategories')->get();

        $query = Product::with('category', 'subcategory');

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->subcategory_id) {
            $query->where('subcategory_id', $request->subcategory_id);
        }

        $products = $query->get();

        $selectedCategory = $request->category_id ? Category::find($request->category_id) : null;

        return view('products', compact('products', 'categories', 'selectedCategory'));
    }

    public function show(Product $product)
    {
        return view('product-detail', compact('product'));
    }
}
