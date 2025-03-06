@extends('layouts.sidebar')

@section('content')
{{--    <div class="card py-2 w-50">--}}
{{--        <div class="card-body">--}}
{{--            <h3 class="pb-4 font-weight-bold">Search for flights of add a new one:</h3>--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-6 py-2">--}}
{{--                    <input type="text" class="form-control" placeholder="Search"/>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <form action="{{route('flights.store')}}" method="post">--}}
{{--                @csrf--}}
{{--                @php--}}
{{--                    $flight_fields = [--}}
{{--                        'flight_number' => 'Flight Number',--}}
{{--                        'flight_class' => 'Flight Class',--}}
{{--                        'seat_number' => 'Seat Number',--}}
{{--                        'departure_from' => 'Departure Location',--}}
{{--                        'arrival_to' => 'Arrival Location',--}}
{{--                    ];--}}
{{--                @endphp--}}

{{--                <fieldset>--}}
{{--                    <div class="row">--}}
{{--                        @foreach ($flight_fields as $name => $placeholder)--}}
{{--                            <div class="col-md-6 py-2">--}}
{{--                                <input type="text" class="form-control" name="{{ $name }}" placeholder="{{ $placeholder }}" />--}}
{{--                            </div>--}}
{{--                        @endforeach--}}

{{--                        <div class="col-md-6 py-2">--}}
{{--                            <select class="form-control" name="carrier">--}}
{{--                                <option value="" disabled selected>Select carrier</option>--}}
{{--                                <option value="Lufthansa">Lufthansa</option>--}}
{{--                                <option value="Air France">Air France</option>--}}
{{--                                <option value="British Airways">British Airways</option>--}}
{{--                                <option value="KLM Royal Dutch Airlines">KLM Royal Dutch Airlines</option>--}}
{{--                                <option value="Turkish Airlines">Turkish Airlines</option>--}}
{{--                                <option value="Ryanair">Ryanair</option>--}}
{{--                                <option value="easyJet">easyJet</option>--}}
{{--                                <option value="Swiss International Air Lines">Swiss International Air Lines</option>--}}
{{--                                <option value="SAS Scandinavian Airlines">SAS Scandinavian Airlines</option>--}}
{{--                                <option value="Austrian Airlines">Austrian Airlines</option>--}}
{{--                                <option value="American Airlines">American Airlines</option>--}}
{{--                                <option value="Delta Airlines">Delta Airlines</option>--}}
{{--                                <option value="Qantas">Qantas</option>--}}
{{--                                <option value="Aeroflot">Aeroflot</option>--}}
{{--                                <option value="Japan Airlines">Japan Airlines</option>--}}

{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-6 py-2">--}}
{{--                            <input type="date" class="form-control" name="departure_date" placeholder="Departure Date" />--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 py-2">--}}
{{--                            <input type="date" class="form-control" name="arrival_date" placeholder="Arrival Date" />--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-md-6 py-2">--}}
{{--                            <button type="submit" class="btn btn-primary">Confirm</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </fieldset>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
