<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:clients.index');
    }

    public function index()
    {
        if(auth()->user()->id == 1){
            $clients = Client::orderBy('id', 'DESC')->paginate(30);
        }else{
            $clients = Client::orderBy('id', 'DESC')->where('user_id',auth()->user()->id)->paginate(30);
        }

    	return Inertia::render('Clients/Index', compact('clients'));
    }

    public function create()
    {
        $this->middleware('permission:clients.create');
    	return Inertia::render('Clients/Create');
    }

    public function store(CreateClientRequest $request)
    {
        $this->middleware('permission:clients.create');
    	$client = Client::create([
            'fullname'          => $request->fullname,
            'phone'             => $request->phone,
            'email'             => $request->email,
            'country'           => $request->country,
            'city'              => $request->city,
            'user_id'           => auth()->user()->id,
            'status_id'         => 1
    	]);

        return Redirect::route('clients.index')->with('notification', [
            'status' => 'success',
            'message'=> 'Guardado Exitosamente',
        ]);
    }

    public function edit(Client $client)
    {
        $this->middleware('permission:clients.edit');
        return Inertia::render('Clients/Edit', compact('client'));
    }

    public function update(Client $client, CreateClientRequest $request)
    {
        $this->middleware('permission:clients.edit');
        $client->update([
            'fullname'          => $request->fullname,
            'phone'             => $request->phone,
            'email'             => $request->email,
            'country'           => $request->country,
            'city'              => $request->city
        ]);

        return Redirect::route('clients.index')->with('notification', [
            'status' => 'success',
            'message'=> 'Guardado Exitosamente',
        ]);
    }
}
