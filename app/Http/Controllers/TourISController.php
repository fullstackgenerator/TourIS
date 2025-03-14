<?php

namespace App\Http\Controllers;

use App\Models\TourisAccommodation;

class TourISController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accommodations = TourisAccommodation::paginate(5);
        $selectedClient = session('selected_client');

        return view('touris.index', compact('accommodations', 'selectedClient'));
    }
}
