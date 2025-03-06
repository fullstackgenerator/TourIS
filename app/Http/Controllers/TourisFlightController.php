<?php

namespace App\Http\Controllers;

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

}
