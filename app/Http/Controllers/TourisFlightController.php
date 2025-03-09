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
            'flight_class' => 'required|string|max:50',
            'seat_number' => 'required|string|max:10',
            'departure_from_start' => 'required|string|max:255',
            'arrival_to_start' => 'required|string|max:255',
            'departure_from_finish' => 'required|string|max:255',
            'arrival_to_finish' => 'required|string|max:255',
            'carrier' => 'required|string|max:100',
            'departure_date_to_destination' => 'required|date',
            'departure_date_from_destination' => 'required|date',
            'flights_total_amount' => 'required|numeric|min:0',
        ]);

        $flight = new TourisFlight([
            'flight_class' => $request->flight_class,
            'seat_number' => $request->seat_number,
            'departure_airport_trip_A' => $request->departure_airport_trip_A,
            'arrival_airport_trip_A' => $request->arrival_airport_trip_A,
            'arrival_airport_trip_A_date' => $request->arrival_airport_trip_A_date,
            'departure_airport_trip_B' => $request->departure_airport_trip_B,
            'arrival_airport_trip_B' => $request->arrival_airport_trip_B,
            'departure_airport_trip_B_date' => $request->departure_airport_trip_B_date,
            'arrival_airport_trip_B_date' => $request->arrival_airport_trip_B_date,
            'carrier' => $request->carrier,
            'flights_total_amount' => $request->flights_total_amount,
        ]);

        $flight->save();

        return redirect()->route('flights.index');
    }
}
