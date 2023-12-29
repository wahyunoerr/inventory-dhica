<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_in;
use Illuminate\Http\Request;

class ProductInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product_in::with('product')->get();

        return view('product_in.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productIn = Product::all();

        return view('product_in.create', ['productIn' => $productIn]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_in' => 'required',
            'qty' => 'required',
            'date' => 'required'
        ]);


        $produkIn = new Product_in();
        $produkIn->product_id = $request->product_in;
        $produkIn->qty = $request->qty;
        $produkIn->date = $request->date;

        $produkIn->save();


        $produk = Product::find($request->product_in);
        if ($produk) {
            $produk->stock += $request->qty;
            $produk->save();
        } else {
            return redirect()->back();
        }


        return redirect('produkIn');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product_in $product_in)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product_in $product_in)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product_in $product_in)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product_in $product_in)
    {
        $product = Product::find($product_in->product_id);
        $product->stock -= $product_in->qty;

        $product->save();

        $product_in->delete();

        return redirect('produkIn');
    }
}
