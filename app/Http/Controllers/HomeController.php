<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Product_in;
use App\Models\Product_out;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    function index(): View
    {
        return view('auth.login');
    }

    function dashboard()
    {
        $product = Product::all();
        $category = Category::all();
        $productIn = Product_in::all();
        $productOut = Product_out::all();

        $chartProd = Product_in::select(DB::raw("SUM(product_ins.qty) as sum"), DB::raw("DAYNAME(date) as day_name"))
            ->whereYear('date', date('Y'))
            ->groupBy(DB::raw("Day(date)"))
            ->pluck('sum', 'day_name');

        $chartProdOut = Product_out::select(DB::raw("SUM(product_outs.qty) as sum"), DB::raw("DAYNAME(date) as day_name"))
            ->whereYear('date', date('Y'))
            ->groupBy(DB::raw("Day(date)"))
            ->pluck('sum', 'day_name');

        $labelsIn = $chartProd->keys();
        $labelsOut = $chartProdOut->keys();
        $dataIn = $chartProd->values();
        $dataOut = $chartProdOut->values();

        // dd(
        //     $dataIn,
        //     $dataOut,
        //     $labelsIn,
        //     $labelsOut
        // );
        return view('dashboard', compact('product', 'category', 'productIn', 'productOut', 'dataIn', 'dataOut', 'labelsIn', 'labelsOut'));
    }
    function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended($this->redirectPath());
        }

        return redirect()->back();
    }

    protected function redirectPath()
    {
        return '/dashboard';
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
