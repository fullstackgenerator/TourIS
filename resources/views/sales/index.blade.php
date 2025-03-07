@extends('layouts.sidebar')

@section('content')
    <div class="container mt-4">
        <h2>Sales Records</h2>

        @if($sales->isEmpty())
            <p>No sales records found.</p>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                    <tr>
                        <th>Client Name</th>
                        <th>Accommodation</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Flight Number</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                        <th>Total Amount</th>
                        <th>Payment Type</th>
                        <th>Cancellation</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td>{{ optional($sale->client)->first_name }} {{ optional($sale->client)->last_name }}</td>
                            <td>{{ optional($sale->accommodation)->accommodation_name }}</td>
                            <td>{{ $sale->date_from }}</td>
                            <td>{{ $sale->date_to }}</td>
                            <td>{{ $sale->flight_number }}</td>
                            <td>{{ $sale->departure_from }}</td>
                            <td>{{ $sale->arrival_to }}</td>
                            <td>${{ number_format($sale->accommodation_total_amount + $sale->flights_total_amount, 2) }}</td>
                            <td>{{ $sale->payment_type }}</td>
                            <td>{{ $sale->cancellation ? 'Yes (+15%)' : 'No' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center">
                {{ $sales->links() }}
            </div>
        @endif
    </div>
@endsection
