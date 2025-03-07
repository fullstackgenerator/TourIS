@extends('layouts.sidebar')

@section('content')
    <div class="card py-2 w-100 mx-auto">
        <div class="card-body">
            <h3 class="pb-4 font-weight-bold">Manage accommodations</h3>

            <div class="row">

                    <h4>Search accommodations</h4>

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
                            <td>{{ $sale->first_name }} {{ $sale->last_name }}</td>
                            <td>{{ $sale->accommodation_name }}</td>
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
            </div>
        </div>
    </div>
@endsection
