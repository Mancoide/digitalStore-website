<?php

namespace App\Http\Controllers;

use App\Models\PackageProduct;
use App\Models\Product;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $products = Product::with('packages', 'media')->active()->get();

        return Inertia::render('Home', compact('products'));
    }

    public function buyAccounts(Request $request)
    {
        $request->validate([
            'package_id' => 'required|integer',
            'quantity'   => 'required|integer|min:1'
        ]);

        $pivotProdPack = PackageProduct::where('product_id', $request->product_id)
            ->where('package_id', $request->package_id)
            ->first();

        $total_amount = $pivotProdPack->cost * $request->quantity;

        if(auth()->user()->amount < $total_amount)
        {
            return Redirect::back()->withErrors([
                'balance' => 'Saldo Insuficiente para realizar la compra.'
            ]);
        }

        DB::transaction(function () use ($request) {

        });

        return Redirect::route('home.index')->with('notification', [
            'status' => 'success',
            'message'=> 'Compra hecha Exitosamente',
        ]);;
    }
}
