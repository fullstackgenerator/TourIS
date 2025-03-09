<?php

namespace App\Http\Controllers;

use App\Exports\SalesExport;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Sale;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;


class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $client = session('selected_client');
        $accommodation = session('accommodation');

        $query = Sale::with(['client', 'accommodation']);

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('accommodation_name', 'like', "%{$search}%")
                    ->orWhere('departure_airport_trip_A', 'like', "%{$search}%")
                    ->orWhere('arrival_airport_trip_A', 'like', "%{$search}%")
                    ->orWhere('departure_airport_trip_B', 'like', "%{$search}%")
                    ->orWhere('arrival_airport_trip_B', 'like', "%{$search}%")
                    ->orWhere('payment_type', 'like', "%{$search}%");
            });
        }

        $sales = $query->simplePaginate(5);

        return view('sales.index', compact('sales', 'client', 'accommodation'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'accommodation_name' => 'nullable|string',
            'accommodation_address' => 'nullable|string',
            'accommodation_city' => 'nullable|string',
            'accommodation_country' => 'nullable|string',
            'accommodation_phone' => 'nullable|string',
            'accommodation_email' => 'nullable|email',
            'date_from' => 'nullable|date',
            'date_to' => 'nullable|date',
            'accommodation_total_amount' => 'nullable|numeric',

            'flight_class' => 'required|nullable|string',
            'seat_number' => 'nullable|string',
            'departure_airport_trip_A' => 'string|max:255',
            'arrival_airport_trip_A' => 'string|max:255',
            'departure_airport_trip_A_date' => 'string|max:255',
            'arrival_airport_trip_A_date' => 'string|max:255',
            'departure_airport_trip_B' => 'string|max:255',
            'arrival_airport_trip_B' => 'string|max:255',
            'departure_airport_trip_B_date' => 'string|max:255',
            'arrival_airport_trip_B_date' => 'string|max:255',
            'carrier' => 'nullable|string',
            'flights_total_amount' => 'nullable|numeric',

            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'client_address' => 'nullable|string',
            'client_phone' => 'nullable|string',
            'client_email' => 'nullable|email',

            'payment_type' => 'nullable|string',
            'amount' => 'nullable|numeric',
            'payment_date' => 'nullable|date',
            'full_name' => 'nullable|string',
            'receipt_address' => 'nullable|string',
            'receipt_phone' => 'nullable|string',
        ]);

        $sale = Sale::create($validated);

        return redirect()->route('sales.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        return view('sales.edit', compact('sale'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        $sale->update($request->validated());
        return redirect()->route('sales.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index');
    }

    public function export()
    {
        return Excel::download(new SalesExport(), 'sales.xlsx');
    }

    public function exportPdf()
    {
        $sales = Sale::all();
        $pdf = Pdf::loadView('sales.pdf', compact('sales'))
            ->setPaper('a4', 'landscape');
        return $pdf->download('sales_report.pdf');
    }
}
