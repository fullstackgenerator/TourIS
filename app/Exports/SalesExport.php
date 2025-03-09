<?php

namespace App\Exports;

use App\Models\Sale;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SalesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Get sales data collection.
     */
    public function collection()
    {
        return Sale::all();
    }

    /**
     * Define column headings for the Excel sheet.
     */
    public function headings(): array
    {
        return [
            'Client Name',
            'Accommodation',
            'Check-in',
            'Check-out',
            'Departure from',
            'Departure date',
            'Arrival at',
            'Arrival date',
            'Departure from',
            'Departure date',
            'Arrival at',
            'Arrival date',
            'Total Amount (€)',
            'Payment Type',
        ];
    }

    /**
     * Map data to match the required format.
     */
    public function map($sale): array
    {
        return [
            $sale->first_name . ' ' . $sale->last_name,
            $sale->accommodation_name,
            Carbon::parse($sale->date_from)->format('d. m. Y'),
            Carbon::parse($sale->date_to)->format('d. m. Y'),
            $sale->departure_airport_trip_A,
            $sale->departure_airport_trip_A_date . Carbon::parse($sale->departure_airport_trip_A_date)->format('d. m. Y'),
            $sale->arrival_airport_trip_A,
            $sale->arrival_airport_trip_A_date . Carbon::parse($sale->arrival_airport_trip_A_date)->format('d. m. Y'),
            $sale->departure_airport_trip_B,
            $sale->departure_airport_trip_B_date . Carbon::parse($sale->departure_airport_trip_B_date)->format('d. m. Y'),
            $sale->arrival_airport_trip_B,
            $sale->arrival_airport_trip_B_date . Carbon::parse($sale->arrival_airport_trip_B_date)->format('d. m. Y'),
            '€' . number_format($sale->accommodation_total_amount + $sale->flights_total_amount, 2),
            $sale->payment_type,
        ];
    }
}
