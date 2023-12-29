<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_out;
use Illuminate\Http\Request;

class ProductOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product_out::with('product')->get();

        return view('product_out.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produk = Product::all();

        return view('product_out.create', ['produk' => $produk]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_out' => 'required',
            'qty' => 'required',
            'date' => 'required'
        ]);

        $produkOut = new Product_out();

        $produkOut->product_id = $request->product_out;
        $produkOut->qty = $request->qty;
        $produkOut->date = $request->date;
        $produkOut->save();

        $produk = Product::find($request->product_out);
        if ($produk) {
            $produk->stock -= $request->qty;
            $produk->save();
        } else {
            return redirect()->back();
        }

        return redirect('produkOut');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product_out $product_out)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product_out $product_out)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product_out $product_out)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product_out $product_out)
    {
        $product = Product::find($product_out->product_id);
        $product->stock += $product_out->qty;

        $product->save();

        $product_out->delete();

        return redirect('produkOut');
    }
}
