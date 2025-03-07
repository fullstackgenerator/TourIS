@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('sales.index') }}">
            @csrf
            <div class="row">
                <!-- Accommodation card -->
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">To add an accommodation, click the accommodations tab.</h5>

                            @php
                                $accommodation = session('accommodation');
                            @endphp

                            <div class="row">
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="accommodation_name"
                                           placeholder="Name" value="{{ $accommodation->accommodation_name ?? '' }}"
                                           readonly/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="accommodation_address"
                                           placeholder="Address"
                                           value="{{ $accommodation->accommodation_address ?? '' }}" readonly/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="accommodation_city"
                                           placeholder="City" value="{{ $accommodation->accommodation_city ?? '' }}"
                                           readonly/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="accommodation_country"
                                           placeholder="Country"
                                           value="{{ $accommodation->accommodation_country ?? '' }}" readonly/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="accommodation_phone"
                                           placeholder="Phone" value="{{ $accommodation->accommodation_phone ?? '' }}"
                                           readonly/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="accommodation_email"
                                           placeholder="Email" value="{{ $accommodation->accommodation_email ?? '' }}"
                                           readonly/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="date" class="form-control" name="date_from"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="date" class="form-control" name="date_to"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="number" class="form-control" name="accommodation_total_amount"
                                           placeholder="Amount"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--flights card--}}
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Add flight details</h5>
                            <div class="row">
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="flight_number"
                                           placeholder="Flight number" value="{{ old('flight_number') }}"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="flight_class"
                                           placeholder="Flight class" value="{{ old('flight_class') }}"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="seat_number" placeholder="Seat number"
                                           value="{{ old('seat_number') }}"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="departure_from"
                                           placeholder="Departure location" value="{{ old('departure_from') }}"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="arrival_to"
                                           placeholder="Arrival location" value="{{ old('arrival_to') }}"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <select class="form-control" name="carrier">
                                        <option value="" disabled selected>Select carrier</option>
                                        <option value="Lufthansa" {{ old('carrier') == 'Lufthansa' ? 'selected' : '' }}>
                                            Lufthansa
                                        </option>
                                        <option
                                            value="Air France" {{ old('carrier') == 'Air France' ? 'selected' : '' }}>
                                            Air France
                                        </option>
                                        <option
                                            value="British Airways" {{ old('carrier') == 'British Airways' ? 'selected' : '' }}>
                                            British Airways
                                        </option>
                                        <option
                                            value="KLM Royal Dutch Airlines" {{ old('carrier') == 'KLM Royal Dutch Airlines' ? 'selected' : '' }}>
                                            KLM Royal Dutch Airlines
                                        </option>
                                        <option
                                            value="Turkish Airlines" {{ old('carrier') == 'Turkish Airlines' ? 'selected' : '' }}>
                                            Turkish Airlines
                                        </option>
                                        <option value="Ryanair" {{ old('carrier') == 'Ryanair' ? 'selected' : '' }}>
                                            Ryanair
                                        </option>
                                        <option value="easyJet" {{ old('carrier') == 'easyJet' ? 'selected' : '' }}>
                                            easyJet
                                        </option>
                                        <option
                                            value="Swiss International Air Lines" {{ old('carrier') == 'Swiss International Air Lines' ? 'selected' : '' }}>
                                            Swiss International Air Lines
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="date" class="form-control" name="departure_date"
                                           value="{{ old('departure_date') }}"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="date" class="form-control" name="arrival_date"
                                           value="{{ old('arrival_date') }}"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="number" class="form-control" name="flights_total_amount"
                                           placeholder="Amount" value="{{ old('flights_total_amount') }}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{--                  Clients card--}}
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">To add a client, click the client tab.</h5>

                            @php
                                $client = session('selected_client');
                            @endphp

                            <div class="row">
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="first_name"
                                           placeholder="First name" value="{{ $client['first_name'] ?? '' }}" readonly/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="last_name"
                                           placeholder="Last name" value="{{ $client['last_name'] ?? '' }}" readonly/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="date" class="form-control" name="date_of_birth"
                                           value="{{ $client['date_of_birth'] ?? '' }}" readonly/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="client_address"
                                           placeholder="Address" value="{{ $client['client_address'] ?? '' }}"
                                           readonly/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="client_phone"
                                           placeholder="Phone" value="{{ $client['client_phone'] ?? '' }}" readonly/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="client_email"
                                           placeholder="Email" value="{{ $client['client_email'] ?? '' }}" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                            Payment details--}}
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Payment details</h5>

                            <div class="row">
                                <div class="col-md-6 py-2">
                                    <select class="form-control" name="payment_type">
                                        <option value="" disabled selected>Select payment type</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Credit card">Credit card</option>
                                        <option value="Bank transfer">Bank transfer</option>
                                    </select>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="number" class="form-control" name="amount"
                                           placeholder="Amount"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="date" class="form-control" name="payment_date"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="full_name"
                                           placeholder="Full name"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="receipt_address"
                                           placeholder="Address"/>
                                </div>
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control" name="receipt_phone" placeholder="Phone"/>
                                </div>
                                <div class="col-md-6 py-3">
                                    <div class="form-check">
                                        <input type="hidden" name="cancellation" value="0">
                                        <input type="checkbox" class="form-check-input" name="cancellation" value="1" id="cancellation">
                                        <label class="form-check-label" for="cancellation">Cancellation option (+15%)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
