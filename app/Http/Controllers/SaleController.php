<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display the sales page with client and accommodation data.
     */
    public function index()
    {
        $client = session('selected_client');
        $accommodation = session('accommodation');
        $sales = Sale::with(['client', 'accommodation'])->paginate(10);
        return view('sales.index', compact('sales', 'client', 'accommodation'));
    }
}
