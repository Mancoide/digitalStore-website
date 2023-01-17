<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Banner;
use App\Models\Movement;
use App\Models\PackageProduct;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
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
        $products = Product::with('packages', 'media')
            ->whereHas('accounts', function($query) {
                $query->Active();
            })
            ->active()
            ->get();
        $banners = Banner::with(['media'])->orderBy('order')
            ->where('section', 1)
            ->get();

        return Inertia::render('Home', compact('products', 'banners'));
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

        //VALIDAR CANTIDAD HABILITADAS
        $accounts = Account::where('product_id', $request->product_id)
            ->where('package_id', $request->package_id)
            ->active()
            ->get();

        if($request->quantity <= 0 || $accounts->count() < $request->quantity) {
            return Redirect::back()->withErrors([
                'balance' => 'La cantidad de cuentas solicitadas no estan disponibles.'
            ]);
        }


        DB::transaction(function () use ($request, $total_amount, $accounts) {

            $productCost = PackageProduct::where('product_id', $request->product_id)
                ->where('package_id', $request->package_id)
                ->first();

            foreach($accounts as $account)
            {
                Movement::create([
                    'date' => date('d/m/Y'),
                    'account_id' => $account->id,
                    'type_movement' => 5, //Venta Cuenta
                    'unitary_cost' => $productCost->cost,
                    'package_cost' => $productCost->package->cost,
                    'quantity_profiles' => $productCost->quantity_people,
                    'createdBy' => auth()->user()->id,
                ]);

                $account->update([
                    'seller_id' => auth()->user()->id,
                    'status_id' => 14 // Agotado
                ]);
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

            User::find(auth()->user()->id)->update([
                'amount' => auth()->user()->amount - $total_amount
            ]);
        });


        return Redirect::back()->with('notification', [
            'status' => 'success',
            'message'=> 'Compra realizada Exitosamente',
        ]);
    }
}
