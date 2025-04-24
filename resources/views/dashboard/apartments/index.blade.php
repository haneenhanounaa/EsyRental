@extends('dashboard.index')

@section('content')
    <div class="container">
        <h2>Manage Apartments</h2>
        <a href="{{ route('apartments.create') }}" class="btn btn-primary mb-3">Add Apartment</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Price</th>
                    <th>Rooms</th>
                    {{-- <th>Number of Nights</th> --}}
                    <th>Guests</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($apartments as $apartment)
                    <tr>
                        <td>
                          @if($apartment->image)
                             <img src="{{ asset('storage/' . $apartment->image) }}" width="50" height="50" class="rounded">
                          @else
                            <img src="{{ asset('images/default-apartment.jpg') }}" width="50" height="50" class="rounded">
                          @endif
                        </td>
                        <td>{{ $apartment->title }}</td>
                        <td>{{ $apartment->location }}</td>
                        <td>${{ $apartment->price }}</td>
                        <td>{{ $apartment->rooms }}</td>
                        {{-- <td>{{ $apartment->number_of_nights }}</td> --}}
                        <td>{{ $apartment->num_guests }}</td>
                        <td>
                            <a href="{{ route('apartments.edit', $apartment) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('apartments.destroy', $apartment) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
