<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ClientController extends Controller
{
    public function index()
    {
    	$clients = Client::orderBy('id', 'DESC')->paginate(30);

    	return Inertia::render('Clients/Index', compact('clients'));
    }

    public function create()
    {
    	return Inertia::render('Clients/Create');
    }

    public function store(CreateClientRequest $request)
    {
    	$client = Client::create([
            'fullname'          => $request->fullname,
            'phone'             => $request->phone,
            'email'             => $request->email,
            'country'           => $request->country,
            'city'              => $request->city,
            'status_id'         => 1
    	]);

        return Redirect::route('clients.index')->with('notification', [
            'status' => 'success',
            'message'=> 'Guardado Exitosamente',
        ]);
    }

    public function edit(Client $client)
    {
        return Inertia::render('Clients/Edit', compact('client'));
    }

    public function update(Client $client, CreateClientRequest $request)
    {
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
