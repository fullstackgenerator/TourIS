<?php

namespace App\Http\Controllers;

use App\Models\TourisFlight;
use Illuminate\Http\Request;

class TourisFlightController extends Controller
{
    /**
     * Display the flight search form.
     */
    public function index()
    {
        return view('flights.index');
    }

    /**
     * Store the flight data.
     */
    public function store(Request $request)
    {
        $request->validate([
            'flight_number' => 'required|string|max:10',
            'flight_class' => 'required|string|max:50',
            'seat_number' => 'required|string|max:10',
            'departure_from' => 'required|string|max:255',
            'arrival_to' => 'required|string|max:255',
            'carrier' => 'required|string|max:100',
            'departure_date' => 'required|date',
            'arrival_date' => 'required|date',
            'flights_total_amount' => 'required|numeric|min:0',
        ]);

        $flight = new TourisFlight([
            'flight_number' => $request->flight_number,
            'flight_class' => $request->flight_class,
            'seat_number' => $request->seat_number,
            'departure_from' => $request->departure_from,
            'arrival_to' => $request->arrival_to,
            'carrier' => $request->carrier,
            'departure_date' => $request->departure_date,
            'arrival_date' => $request->arrival_date,
            'flights_total_amount' => $request->flights_total_amount,
        ]);

        $flight->save();

        return redirect()->route('flights.index');
    }
}
