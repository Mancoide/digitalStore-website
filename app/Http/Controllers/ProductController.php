<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Package;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProductController extends Controller
{
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
        DB::transaction(function () use ($request) {
            $product = Product::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'status_id' => 9
            ]);

            $product->packages()->attach($request->packages);

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
        DB::transaction(function () use ($request, $product) {
            $product->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'status_id' => $request->status_id
            ]);

            $product->packages()->sync($request->packages);

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
