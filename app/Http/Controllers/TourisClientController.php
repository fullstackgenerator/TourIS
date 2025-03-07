<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTourisClientRequest;
use App\Models\TourisClient;
use Illuminate\Http\Request;

class TourisClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clients = TourisClient::when($request->search, function ($query) use ($request) {
            $query->where('first_name', 'like', "%{$request->search}%")
                ->orWhere('last_name', 'like', "%{$request->search}%")
                ->orWhere('client_email', 'like', "%{$request->search}%");
        })->simplePaginate(5);

        return view('clients.index', compact('clients'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTourisClientRequest $request)
    {
        $clients = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'client_address' => 'required',
            'client_phone' => 'required',
            'client_email' => 'required',
        ]);

        TourisClient::create($clients);
        return redirect()->route('clients.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = TourisClient::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'client_address' => 'required|string|max:255',
            'client_phone' => 'required|string|max:255',
            'client_email' => 'required|string|email|max:255|unique:touris_clients,client_email,' . $id,
        ]);

        $client = TourisClient::findOrFail($id);
        $client->update($validated);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $touris_client = TourisClient::findOrFail($id);
        $touris_client->delete();
        return redirect()->route('clients.index');
    }

    public function selectClient(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:touris_clients,id',
        ]);

        $client = TourisClient::findOrFail($request->client_id);
        session(['selected_client' => $client]);

        return redirect()->route('touris.index');
    }
}
