@extends('layouts.sidebar')

@section('content')
    <div class="card py-2 w-100 mx-auto">
        <div class="card-body">
            <h3 class="pb-4 font-weight-bold">Manage accommodations</h3>

            <div class="row">
                <div class="col-md-6">
                    <h4>Search accommodations</h4>
                    <form method="GET" action="{{ route('accommodations.index') }}" class="mb-4">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search"
                                   value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>

                    <table class="table table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>City</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($accommodations as $accommodation)
                            <tr>
                                <td>{{ $accommodation->accommodation_name }}</td>
                                <td>{{ $accommodation->accommodation_city }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('accommodations.edit', $accommodation->id) }}"
                                           class="btn btn-warning">Edit</a>

                                        <form action="{{ route('accommodations.select') }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="accommodation_id" value="{{ $accommodation->id }}">
                                            <button type="submit" class="btn btn-success">Select</button>
                                        </form>

                                        <form action="{{ route('accommodations.destroy', $accommodation->id) }}"
                                              method="POST">
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

                    <!-- Pagination links -->
                    <div class="pagination">
                        {{ $accommodations->links() }}
                    </div>
                </div>

                <div class="col-md-6">
                    <h4>Add accommodations</h4>
                    <form action="{{ route('accommodations.store') }}" method="post">
                        @csrf
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

                        @foreach ($accommodation_fields as $name => $placeholder)
                            <div class="mb-3">
                                <input type="text" class="form-control" name="{{ $name }}"
                                       placeholder="{{ $placeholder }}" required/>
                            </div>
                        @endforeach

                        <button type="submit" class="btn btn-primary w-100">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
