@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <div class="card py-2 w-100 mx-auto">
            <div class="card-body">
                <h3 class="pb-4 font-weight-bold">Edit sales</h3>

                <div class="row">
{{--    Display validation error--}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Update form -->
        <form action="{{ route('sales.update', $sale->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Accommodation details -->
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Accommodation details</h5>

                            <div class="row">
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="accommodation_name"
                                           placeholder="Name" value="{{ old('accommodation_name', $sale->accommodation_name) }}"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="accommodation_address"
                                           placeholder="Address"
                                           value="{{ old('accommodation_address', $sale->accommodation_address) }}"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="accommodation_city"
                                           placeholder="City" value="{{ old('accommodation_city', $sale->accommodation_city) }}"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="accommodation_country"
                                           placeholder="Country"
                                           value="{{ old('accommodation_country', $sale->accommodation_country) }}"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="date" class="form-control" name="date_from"
                                           value="{{ old('date_from', $sale->date_from) }}"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="date" class="form-control" name="date_to"
                                           value="{{ old('date_to', $sale->date_to) }}"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="number" class="form-control" name="accommodation_total_amount"
                                           placeholder="Amount"
                                           value="{{ old('accommodation_total_amount', $sale->accommodation_total_amount) }}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Flight details -->
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Flight details</h5>

                            <div class="row">
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="flight_number"
                                           placeholder="Flight number" value="{{ old('flight_number', $sale->flight_number) }}"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="flight_class"
                                           placeholder="Flight class" value="{{ old('flight_class', $sale->flight_class) }}"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="seat_number"
                                           placeholder="Seat number" value="{{ old('seat_number', $sale->seat_number) }}"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="departure_from"
                                           placeholder="Departure location" value="{{ old('departure_from', $sale->departure_from) }}"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="arrival_to"
                                           placeholder="Arrival location" value="{{ old('arrival_to', $sale->arrival_to) }}"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <select class="form-control" name="carrier">
                                        <option value="" disabled selected>Select carrier</option>
                                        <option value="Lufthansa" {{ old('carrier', $sale->carrier) == 'Lufthansa' ? 'selected' : '' }}>Lufthansa</option>
                                        <option value="Air France" {{ old('carrier', $sale->carrier) == 'Air France' ? 'selected' : '' }}>Air France</option>
                                        <option value="British Airways" {{ old('carrier', $sale->carrier) == 'British Airways' ? 'selected' : '' }}>British Airways</option>
                                        <option value="KLM Royal Dutch Airlines" {{ old('carrier', $sale->carrier) == 'KLM Royal Dutch Airlines' ? 'selected' : '' }}>KLM Royal Dutch Airlines</option>
                                        <option value="Turkish Airlines" {{ old('carrier', $sale->carrier) == 'Turkish Airlines' ? 'selected' : '' }}>Turkish Airlines</option>
                                        <option value="Ryanair" {{ old('carrier', $sale->carrier) == 'Ryanair' ? 'selected' : '' }}>Ryanair</option>
                                        <option value="easyJet" {{ old('carrier', $sale->carrier) == 'easyJet' ? 'selected' : '' }}>easyJet</option>
                                        <option value="Swiss International Air Lines" {{ old('carrier', $sale->carrier) == 'Swiss International Air Lines' ? 'selected' : '' }}>Swiss International Air Lines</option>
                                    </select>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="date" class="form-control" name="departure_date"
                                           value="{{ old('departure_date', $sale->departure_date) }}"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="date" class="form-control" name="arrival_date"
                                           value="{{ old('arrival_date', $sale->arrival_date) }}"/>
                                </div>
                                <div class="col-md-6 pt-2 py-0">
                                    <input type="number" class="form-control" name="flights_total_amount"
                                           placeholder="Amount" value="{{ old('flights_total_amount', $sale->flights_total_amount) }}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment details -->
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Payment details</h5>

                            <div class="row">
                                <div class="col-md-6 py-2">
                                    <select class="form-control" name="payment_type">
                                        <option value="" disabled selected>Select payment type</option>
                                        <option value="Credit Card" {{ old('payment_type', $sale->payment_type) == 'Credit Card' ? 'selected' : '' }}>Credit Card</option>
                                        <option value="PayPal" {{ old('payment_type', $sale->payment_type) == 'PayPal' ? 'selected' : '' }}>PayPal</option>
                                        <option value="Bank Transfer" {{ old('payment_type', $sale->payment_type) == 'Bank Transfer' ? 'selected' : '' }}>Bank Transfer</option>
                                    </select>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="number" class="form-control" name="amount"
                                           placeholder="Amount" value="{{ old('amount', $sale->amount) }}"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="date" class="form-control" name="payment_date"
                                           value="{{ old('payment_date', $sale->payment_date) }}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('sales.index') }}" class="btn btn-secondary" style="margin-left: 10px;">Cancel</a>
                </div>
            </div>
        </form>

        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display:inline-block; margin-top: 20px;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
