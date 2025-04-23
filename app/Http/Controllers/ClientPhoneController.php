<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Phone;
use Illuminate\Http\Request;

class ClientPhoneController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients',
            'phone_number' => 'required|string',
            'phone_type' => 'nullable|string'
        ]);

        $client = Client::create([
            'name' => $validated['name'],
            'email' => $validated['email']
        ]);

        $client->phone()->create([
            'number' => $validated['phone_number'],
            'type' => $validated['phone_type'] ?? 'mobile'
        ]);

        return redirect()->route('clients.show', $client);
    }

    public function show(Client $client)
    {
        return view('clients.show', [
            'client' => $client->load('phone')
        ]);
    }

    public function updatePhone(Request $request, Client $client)
    {
        $validated = $request->validate([
            'number' => 'required|string',
            'type' => 'nullable|string'
        ]);

        $client->phone()->updateOrCreate(
            ['client_id' => $client->id],
            $validated
        );

        return back()->with('success', 'Phone updated successfully');
    }
}