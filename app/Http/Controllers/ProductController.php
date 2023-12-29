<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with('category')->get();
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create', [
            'category' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|min:2',
            'category' => 'required|integer',
            'product_harga' => 'required|min:2',
            'product_stock' => 'required|integer|min:2',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);

        $product = new Product();
        $product->name = $request->product_name;
        $product->category_id = $request->category;
        $product->harga = $request->product_harga;
        $product->stock = $request->product_stock;
        $product->image = $request->file('image')->store('photo/produk', 'public');
        $product->save();

        return redirect('produk');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $category = Category::all();
        return view('product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update([
            $product->name = $request->product_name,
            $product->category_id = $request->category,
            $product->harga = $request->product_harga,
            $product->stock = $request->product_stock,
            $product->image = $request->file('image')->store('photo/produk', 'public')
        ]);

        return redirect('/produk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('produk');
    }
}
