@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <h3 class="pb-4 font-weight-bold">Edit Clients</h3>

        <form action="{{ route('clients.update', $clients->id) }}" method="POST">
            @csrf
            @method('PUT')

            @php
                $accommodation_fields = [
                    'accommodation_name' => 'Name',
                    'accommodation_address' => 'Address',
                    'accommodation_city' => 'City',
                    'accommodation_country' => 'Country',
                    'accommodation_phone' => 'Phone',
                    'accommodation_email' => 'Email'
                ];
            @endphp

            @foreach ($client_fields as $name => $placeholder)
                <div class="mb-3">
                    <input type="text" class="form-control" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ old($name, $accommodation->$name) }}" />
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancel</a>
        </form>

    </div>
@endsection
