<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccountRequest;
use App\Models\Account;
use App\Models\Movement;
use App\Models\PackageProduct;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::with('product', 'created_by', 'package', 'status')->active()->paginate(30);

        return Inertia::render('Accounts/Index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::with('packages')->active()->get();

        return Inertia::render('Accounts/Create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccountRequest $request)
    {
        DB::transaction(function () use ($request) {
            $pivotPackage = PackageProduct::where('product_id', $request->product_id)
                ->where('package_id', $request->package_id)
                ->first();

            $account = Account::create([
                'subscription_date' => $request->subscription_date,
                'email' => $request->email,
                'password' => $request->password,
                'product_id' => $request->product_id,
                'package_id' => $request->package_id,
                'accounts_available' => $pivotPackage->quantity_people,
                'cost' => $pivotPackage->cost,
                'description' => $request->description,
                'createdBy' => auth()->user()->id,
            ]);

            Movement::create([
                'date' => date('d/m/Y'),
                'account_id' => $account->id,
                'type_movement' => 1, //entrada del producto
                'unitary_cost'  => $pivotPackage->cost,
                'package_cost'  => $pivotPackage->package->cost,
                'quantity_profiles' => $pivotPackage->quantity_people,
                'createdBy' => auth()->user()->id,
            ]);
        });

        return Redirect::route('accounts.index')->with('notification', [
            'status' => 'success',
            'message'=> 'Guardado Exitosamente',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        $products = Product::with('packages')->active()->get();
        $account->load(['product', 'package', 'status']);
        $statuses = Status::where('data_model', 'App\Models\Account')->get();

        return Inertia::render('Accounts/Edit', compact('products', 'statuses', 'account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
