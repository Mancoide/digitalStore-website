<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Package;
use App\Models\PackageProduct;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:products.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('media', 'status')->orderBy('id')->paginate(20);

        return Inertia::render('Products/Index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('permission:products.create');
        $packages = $this->getTypePackages();
        $categories = $this->getCategories();

        return Inertia::render('Products/Create', compact('packages', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $this->middleware('permission:products.create');
        DB::transaction(function () use ($request) {
            $product = Product::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'status_id' => 9
            ]);

            foreach($request->packages as $key => $package)
            {
                PackageProduct::create([
                    'product_id' => $product->id,
                    'package_id' => $package,
                    'quantity_people' => $request->quatity[$key],
                    'cost' => $request->costs[$key]
                ]);
            }

            $product->addMediaFromRequest('logo')
                ->toMediaCollection('productos');
        });

        return Redirect::route('products.index')->with('notification', [
            'status' => 'success',
            'message'=> 'Guardado Exitosamente',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->middleware('permission:products.edit');
        $packages = $this->getTypePackages();
        $categories = $this->getCategories();
        $statuses = Status::where('data_model', 'App\Models\Product')->get();
        $product->load(['media', 'status', 'packages']);

        return Inertia::render('Products/Edit', compact('product', 'packages', 'categories', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->middleware('permission:products.edit');
        DB::transaction(function () use ($request, $product) {
            $product->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'status_id' => $request->status_id
            ]);

            $product->packages()->detach();

            foreach($request->packages as $key => $package)
            {
                PackageProduct::create([
                    'product_id' => $product->id,
                    'package_id' => $package,
                    'quantity_people' => $request->quatity[$key],
                    'cost' => $request->costs[$key]
                ]);
            }

            if($request->logo)
            {
                $product->clearMediaCollection('productos');

                $product->addMediaFromRequest('logo')
                    ->toMediaCollection('productos');
            }
        });

        return Redirect::route('products.index')->with('notification', [
            'status' => 'success',
            'message'=> 'Guardado Exitosamente',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    private function getTypePackages()
    {
        return Package::where('status_id', 7)->get();
    }

    private function getCategories()
    {
        return Category::where('status_id', 5)->get();
    }
}
