<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBannerRequest;
use App\Http\Requests\EditBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:banners.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::with('media')->paginate(30);
        $sections = config('constants.banner-sections');

        return Inertia::render('Banners/Index', compact('banners', 'sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('permission:banners.create');
        $sections = config('constants.banner-sections');

        return Inertia::render('Banners/Create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBannerRequest $request)
    {
        $this->middleware('permission:banners.create');

        $banner = Banner::create([
            'section' => $request->section,
            'order'   => $request->order
        ]);

        $banner->addMediaFromRequest('image')
            ->toMediaCollection('banners');

        return Redirect::route('banners.index')->with('notification', [
            'status' => 'success',
            'message'=> 'Guardado Exitosamente',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        $this->middleware('permission:banners.edit');
        $sections = config('constants.banner-sections');
        $banner->load(['media']);

        return Inertia::render('Banners/Edit', compact('sections', 'banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(EditBannerRequest $request, Banner $banner)
    {
        $this->middleware('permission:banners.edit');

        $banner->update([
            'section' => $request->section,
            'order'   => $request->order
        ]);

        if($request->logo)
        {
            $banner->clearMediaCollection('banners');

            $banner->addMediaFromRequest('image')
                ->toMediaCollection('banners');
        }

        return Redirect::route('banners.index')->with('notification', [
            'status' => 'success',
            'message'=> 'Guardado Exitosamente',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
