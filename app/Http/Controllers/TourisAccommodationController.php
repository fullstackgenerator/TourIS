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
     * Select an accommodation (set session).
     */
    public function selectAccommodation(Request $request)
    {
        $request->validate([
            'accommodation_id' => 'required|exists:touris_accommodations,id',
        ]);

        $accommodation = TourisAccommodation::findOrFail($request->accommodation_id);

        session(['accommodation' => $accommodation]);

        return redirect()->route('sales.index');
    }
}
