@extends('dashboard.index') {{-- Use your admin/owner panel layout --}} {{--this layout for Notification--}}

@section('content')
<div class="container">
    <h2>Booking Request Details</h2>
    <p><strong>Client:</strong> {{ $booking->user->name }}</p>
    <p><strong>Apartment:</strong> {{ $booking->apartment->name }}</p>
    <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
    <p><strong>Start Date:</strong> {{ $booking->start_date }}</p>
    <p><strong>End Date:</strong> {{ $booking->end_date }}</p>
    <p><strong>Total Price:</strong> ${{ $booking->final_price }}</p>

    <form action="{{ route('bookings.confirm', $booking->id) }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-success">Confirm Booking</button>
  </form>
  
</div>
@endsection
