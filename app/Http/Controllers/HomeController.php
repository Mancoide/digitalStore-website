<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Movement;
use App\Models\PackageProduct;
use App\Models\Product;
use App\Models\Transaction;
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

        DB::transaction(function () use ($request, $total_amount) {
            $accounts = Account::where('product_id', $request->product_id)
                ->where('accounts_available', '>', 0)
                ->active()
                ->get();

            $quantity = $request->quantity;

            foreach($accounts as $account)
            {
                $productCost = PackageProduct::where('product_id', $request->product_id)
                    ->where('package_id', $request->package_id)
                    ->first();

                if($account->accounts_available <= $quantity)
                {
                    Movement::create([
                        'date' => date('d/m/Y'),
                        'account_id' => $account->id,
                        'type_movement' => 5, //Venta Cuenta
                        'unitary_cost' => $productCost->cost,
                        'package_cost' => $productCost->package->cost,
                        'quantity_profiles' => $account->accounts_available,
                        'createdBy' => auth()->user()->id,
                    ]);

                    $account->update([
                        'accounts_available' => 0,
                        'status_id' => 14 // Agotado
                    ]);

                    $quantity -= $account->accounts_available;
                }

                if($quantity > 0 && $account->accounts_available > $quantity)
                {
                    Movement::create([
                        'date' => date('d/m/Y'),
                        'account_id' => $account->id,
                        'type_movement' => 5, //Venta Cuenta
                        'unitary_cost' => $productCost->cost,
                        'package_cost' => $productCost->package->cost,
                        'quantity_profiles' => $quantity,
                        'createdBy' => auth()->user()->id,
                    ]);

                    $account->update([
                        'accounts_available' => $account->accounts_available - $quantity,
                    ]);

                    $quantity = 0;
                }
            }

            Transaction::create([
                'type' => 2, //Salida
                'user_id' => auth()->user()->id,
                'before' => auth()->user()->amount,
                'amount' => $total_amount,
                'after'  => auth()->user()->amount - $total_amount,
                'observation' => 'Compra de Cuentas',
                'createdBy'  => auth()->user()->id
            ]);
        });

        return Redirect::route('home.index')->with('notification', [
            'status' => 'success',
            'message'=> 'Compra hecha Exitosamente',
        ]);
    }
}
