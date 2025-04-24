@extends('website.booking')

@section('content')
<div class="container mt-5">
    <h1>For Booking</h1>
    <h2>Book Apartment: {{ $apartment->title }}</h2>
    <p>Price per day: ${{ $apartment->price }}</p>
    <img src="{{ asset('storage/' . $apartment->image) }}" width="200" height="200" class="rounded">

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf

        <input type="hidden" name="apartment_id" value="{{ $apartment->id }}">

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" name="start_date" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" name="end_date" required>
        </div>

       

        <button type="submit" class="btn btn-primary">Book Now</button>
    </form>
</div>
@endsection
