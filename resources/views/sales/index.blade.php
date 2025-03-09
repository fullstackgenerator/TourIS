@php
    use Carbon\Carbon;
@endphp

@extends('layouts.sidebar')

@section('content')
    <div class="card py-2 w-100 mx-auto">
        <div class="card-body">
            <h3 class="pb-4 font-weight-bold">Manage sales</h3>

            <div class="row">

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
                                <th>Departure from</th>
                                <th>Departure date</th>
                                <th>Arrival at</th>
                                <th>Arrival date</th>
                            </tr>
                            @foreach($sales as $sale)
                                <tr>
                                    <td>{{ $sale->first_name }} {{ $sale->last_name }}</td>
                                    <td>{{ $sale->accommodation_name }}</td>
                                    <td>{{ Carbon::parse($sale->date_from)->format('d. m. Y') }}</td>
                                    <td>{{ Carbon::parse($sale->date_to)->format('d. m. Y') }}</td>
                                    <td>{{ $sale->departure_airport_trip_A }}</td>
                                    <td>{{ Carbon::parse($sale->departure_airport_trip_A_date)->format('d. m. Y') }}</td>
                                    <td>{{ $sale->arrival_airport_trip_A }}</td>
                                    <td>{{ Carbon::parse($sale->arrival_airport_trip_A_date)->format('d. m. Y') }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th>Departure from</th>
                                <th>Departure date</th>
                                <th>Arrival at</th>
                                <th>Arrival date</th>
                                <th>Total Amount</th>
                                <th>Payment Type</th>
                                <th>Details</th>
                                <th>Delete</th>
                            </tr>
                            @foreach($sales as $sale)
                                <tr>
                                    <td>{{ $sale->departure_airport_trip_B }}</td>
                                    <td>{{ Carbon::parse($sale->departure_airport_trip_B_date)->format('d. m. Y') }}</td>
                                    <td>{{ $sale->arrival_airport_trip_B }}</td>
                                    <td>{{ Carbon::parse($sale->arrival_airport_trip_B_date)->format('d. m. Y') }}</td>
                                    <td>€{{ number_format($sale->accommodation_total_amount + $sale->flights_total_amount, 2) }}</td>
                                    <td>{{ $sale->payment_type }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning">Edit</a>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display:inline-block; margin-top: 20px;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </thead>
                            <tbody>



                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center gap-2 pt-4">
                            <a href="{{ route('sales.export') }}" class="btn btn-outline-success">Export XLS</a>
                            <a href="{{ route('sales.exportPdf') }}" class="btn btn-outline-danger">Export PDF</a>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center pt-4">
                        {{ $sales->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
