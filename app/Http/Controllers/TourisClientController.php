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
     * Select a client (set session).
     */
    public function selectClient(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:touris_clients,id',
        ]);

        $client = TourisClient::findOrFail($request->client_id);
        session(['selected_client' => $client]);

        return redirect()->route('sales.index');
    }
}
