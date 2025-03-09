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
    public function index()
    {
        $client = session('selected_client');
        $accommodation = session('accommodation');
        $sales = Sale::with(['client', 'accommodation'])->simplePaginate(7);
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

            'flight_class' => 'nullable|string',
            'seat_number' => 'nullable|string',
            'departure_from_start' => 'nullable|string',
            'arrival_to_start' => 'nullable|string',
            'departure_from_finish' => 'nullable|string',
            'arrival_to_finish' => 'nullable|string',
            'carrier' => 'nullable|string',
            'departure_date_to_destination' => 'nullable|date',
            'departure_date_from_destination' => 'nullable|date',
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
