<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePackageRequest;
use App\Http\Requests\EditPackageRequest;
use App\Models\Package;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:packages.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::with('status')->orderBy('id', 'DESC')->paginate(30);

    	return Inertia::render('Packages/Index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('permission:packages.create');
        return Inertia::render('Packages/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePackageRequest $request)
    {
        $this->middleware('permission:packages.create');
        Package::create([
            'name' => $request->name,
            'cost' => $request->cost
        ]);

        return Redirect::route('packages.index')->with('notification', [
            'status' => 'success',
            'message'=> 'Guardado Exitosamente',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        $this->middleware('permission:packages.edit');
        $statuses = Status::where('data_model', 'App\Models\Package')->get();
        $packageInfo = $package;

    	return Inertia::render('Packages/Edit', compact('packageInfo', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(EditPackageRequest $request, Package $package)
    {
        $this->middleware('permission:packages.edit');
        $package->update([
            'name' => $request->name,
            'cost' => $request->cost,
            'status_id' =>  $request->status_id
        ]);

        return Redirect::route('packages.index')->with('notification', [
            'status' => 'success',
            'message'=> 'Guardado Exitosamente',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
    }
}
