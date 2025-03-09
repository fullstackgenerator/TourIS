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
                                <th>Accommodation & Stay</th>
                                <th>Trip A: Departure</th>
                                <th>Trip A: Arrival</th>
                                <th>Trip B: Departure</th>
                                <th>Trip B: Arrival</th>
                                <th>Total Amount</th>
                                <th>Payment Type</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sales as $sale)
                                <tr>
{{--Client's name--}}
                                    <td>{{ $sale->first_name }} {{ $sale->last_name }}</td>
{{--Accommodation and stay--}}
                                    <td>
                                        {{ $sale->accommodation_name }}<br>
                                        <small>{{ Carbon::parse($sale->date_from)->format('d. m. Y') }} - {{ Carbon::parse($sale->date_to)->format('d. m. Y') }}</small>
                                    </td>

{{--Trip A--}}
                                    <td>
                                        {{ $sale->departure_airport_trip_A }}<br>
                                        <small>{{ Carbon::parse($sale->departure_airport_trip_A_date)->format('d. m. Y') }}</small>
                                    </td>
                                    <td>
                                        {{ $sale->arrival_airport_trip_A }}<br>
                                        <small>{{ Carbon::parse($sale->arrival_airport_trip_A_date)->format('d. m. Y') }}</small>
                                    </td>

{{--Trip B--}}
                                    <td>
                                        {{ $sale->departure_airport_trip_B }}<br>
                                        <small>{{ Carbon::parse($sale->departure_airport_trip_B_date)->format('d. m. Y') }}</small>
                                    </td>
                                    <td>
                                        {{ $sale->arrival_airport_trip_B }}<br>
                                        <small>{{ Carbon::parse($sale->arrival_airport_trip_B_date)->format('d. m. Y') }}</small>
                                    </td>

{{--Financial--}}
                                    <td>€{{ number_format($sale->accommodation_total_amount + $sale->flights_total_amount, 2) }}</td>
                                    <td>{{ $sale->payment_type }}</td>


                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
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
