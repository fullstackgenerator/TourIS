@extends('layouts.sidebar')

@section('content')
    <div class="card py-2 w-100 mx-auto">
        <div class="card-body">
            <h3 class="pb-4 font-weight-bold">Manage Clients</h3>

            <div class="row">
                <div class="col-md-6">
                    <h4>Search clients</h4>
                    <form method="GET" action="{{ route('clients.index') }}" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search"
                                   value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>

                    <table class="table table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->first_name }}</td>
                                <td>{{ $client->last_name }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">Edit</a>

                                        <form action="{{ route('clients.select') }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="client_id" value="{{ $client->id }}">
                                            <button type="submit" class="btn btn-success">Select</button>
                                        </form>

                                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="d-inline">
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

                    @if($clients->isEmpty())
                        <p class="text-center text-muted">No clients found.</p>
                    @endif

                    <!-- Pagination links -->
                    <div class="pagination">
                        {{ $clients->links() }}
                    </div>
                </div>

                <!-- Add clients -->
                <div class="col-md-6">
                    <h4>Add clients</h4>
                    <form action="{{ route('clients.store') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <input type="text" class="form-control" name="first_name" placeholder="First name" required/>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" name="last_name" placeholder="Last name" required/>
                        </div>

                        <div class="mb-3">
                            <label for="date_of_birth">Date of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" required/>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" name="client_address" placeholder="Address" required/>
                        </div>

                        <div class="mb-3">
                            <input type="tel" class="form-control" name="client_phone" placeholder="Phone" required/>
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control" name="client_email" placeholder="Email" required/>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
