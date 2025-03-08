<?php

namespace App\Http\Controllers;

use App\Models\TourisAccommodation;
use Illuminate\Http\Request;

class TourisAccommodationController extends Controller
{
    /**
     * Display a listing of accommodations.
     */
    public function index(Request $request)
    {
        $accommodations = TourisAccommodation::when($request->search, function ($query) use ($request) {
            $query->where('accommodation_name', 'like', "%{$request->search}%")
                ->orWhere('accommodation_city', 'like', "%{$request->search}%");
        })->simplePaginate(5);

        return view('accommodations.index', compact('accommodations'));
    }

    /**
     * Store a new accommodation.
     */

    public function store(Request $request)
    {
        $accommodation = $request->validate([
            'accommodation_name' => 'required|string|max:255',
            'accommodation_address' => 'required|string|max:255',
            'accommodation_city' => 'required|string|max:255',
            'accommodation_country' => 'required|string|max:255',
            'accommodation_phone' => 'required|string|max:20',
            'accommodation_email' => 'required|email|max:255',
        ]);

        TourisAccommodation::create($accommodation);
        return redirect()->route('accommodations.index');
    }

    public function edit($id)
    {
        $accommodation = TourisAccommodation::findOrFail($id);
        return view('accommodations.edit', compact('accommodation'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'accommodation_name' => 'required|string|max:255',
            'accommodation_address' => 'required|string|max:255',
            'accommodation_city' => 'required|string|max:255',
            'accommodation_country' => 'required|string|max:255',
            'accommodation_phone' => 'required|string|max:20',
            'accommodation_email' => 'required|email|max:255',
        ]);

        $accommodation = TourisAccommodation::findOrFail($id);
        $accommodation->update($validated);

        return redirect()->route('accommodations.index');
    }

    public function destroy($id)
    {
        $accommodation = TourisAccommodation::findOrFail($id);
        $accommodation->delete();
        return redirect()->route('accommodations.index');
    }

    /**
     * Select an accommodation (previously saveToPackage).
     */
    public function selectAccommodation(Request $request)
    {
        $request->validate([
            'accommodation_id' => 'required|exists:touris_accommodations,id',
        ]);

        $accommodation = TourisAccommodation::findOrFail($request->accommodation_id);
        session(['accommodation' => $accommodation]);

        return redirect()->route('touris.index');
    }
}
