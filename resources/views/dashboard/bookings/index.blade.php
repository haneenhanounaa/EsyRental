@extends('dashboard.index')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">All Bookings</h4>
                </div>
                
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('bookings.export.pdf') }}" class="btn btn-primary">
                            <i class="fas fa-file-pdf"></i> Export to PDF
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Apartment</th>
                                    <th>Guest</th>
                                    <th>Dates</th>
                                    <th>Nights</th>
                                    <th>Price</th>
                                    <th>Final Price</th>
                                    <th>Apartment owner</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->id }}</td>
                                        <td>{{ $booking->apartment->title }}</td>
                                        <td>{{ $booking->user->name }}</td>
                                        <td>
                                            {{ $booking->start_date->format('M d, Y') }} - 
                                            {{ $booking->end_date->format('M d, Y') }}
                                        </td>
                                        <td>{{ $booking->number_of_days }}</td>
                                        <td>${{ number_format($booking->price, 2) }}</td>
                                        <td>${{ number_format($booking->final_price, 2) }}</td>
                                        <td>{{ $booking->apartment->owner->name  }}</td> 

                                        <td>
                                            <span class="badge badge-{{ $booking->status == 'confirmed' ? 'success' : 'warning' }}">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </td>
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No bookings found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection