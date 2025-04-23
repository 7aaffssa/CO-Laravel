<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function store(Request $request)
{
    $client = Client::create($request->only('name', 'email'));
    $client->phone()->create($request->only('number', 'type'));
    return redirect()->back();
}

public function show(Client $client)
{
    return view('clients.show', ['client' => $client->load('phone')]);
}
}
