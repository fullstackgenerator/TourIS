@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <h3 class="pb-4 font-weight-bold">Edit client</h3>

        <form action="{{ route('clients.update', $client->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <input type="text" class="form-control" name="first_name" placeholder="First name" value="{{ old('first_name', $client->first_name) }}" required />
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" name="last_name" placeholder="Last name" value="{{ old('last_name', $client->last_name) }}" required />
            </div>

            <div class="mb-3">
                <label for="date_of_birth">Date of birth</label>
                <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $client->date_of_birth) }}" required />
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" name="client_address" placeholder="Address" value="{{ old('client_address', $client->client_address) }}" required />
            </div>

            <div class="mb-3">
                <input type="tel" class="form-control" name="client_phone" placeholder="Phone" value="{{ old('client_phone', $client->client_phone) }}" required />
            </div>

            <div class="mb-3">
                <input type="email" class="form-control" name="client_email" placeholder="Email" value="{{ old('client_email', $client->client_email) }}" required />
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
