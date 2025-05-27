@extends('website.booking')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <h1 class="fw-bold mb-2">Complete Your Booking</h1>
                            <p class="text-muted">Secure your perfect stay in just a few steps</p>
                        </div>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="border rounded p-4 h-100">
                                    <h3 class="fw-bold mb-3">{{ $apartment->title }}</h3>
                                    <img src="{{ asset('storage/' . $apartment->image) }}"
                                        class="img-fluid rounded mb-3 w-100" style="height: 200px; object-fit: cover;">

                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-geo-alt-fill text-primary me-2"></i>
                                        <span class="text-muted">{{ $apartment->location }}</span>
                                    </div>

                                    <div class="d-flex align-items-center mb-3">
                                        <div class="text-warning me-2">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>
                                        </div>
                                        <span class="text-muted">4.5 (24 reviews)</span>
                                    </div>

                                    <div class="bg-light p-3 rounded">
                                        <h5 class="fw-bold mb-0">${{ $apartment->price }}
                                            <span class="text-muted fw-normal">/ night</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <form action="{{ route('client.bookings.store') }}" method="POST" class="needs-validation"
                                    novalidate>
                                    @csrf
                                    <input type="hidden" name="apartment_id" value="{{ $apartment->id }}">

                                    <h4 class="fw-bold mb-4">Booking Details</h4>

                                    <div class="mb-4">
                                        <label for="start_date" class="form-label fw-bold">Check-in Date</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white">
                                                <i class="bi bi-calendar-check text-primary"></i>
                                            </span>
                                            <input type="date" class="form-control py-2" name="start_date"
                                                id="start_date" required>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="end_date" class="form-label fw-bold">Check-out Date</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white">
                                                <i class="bi bi-calendar-x text-primary"></i>
                                            </span>
                                            <input type="date" class="form-control py-2" name="end_date" id="end_date"
                                                required>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label fw-bold">Total Estimate</label>
                                        <div class="bg-light p-3 rounded">
                                            <div class="d-flex justify-content-between mb-2">
                                                <span class="text-muted">${{ $apartment->price }} x <span
                                                        id="nights-count">0</span> nights</span>
                                                <span class="fw-bold" id="total-price">$0.00</span>
                                            </div>
                                            <hr class="my-2">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-bold">Total</span>
                                                <span class="fw-bold text-primary" id="grand-total">$0.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 py-3 fw-bold rounded-pill">
                                        <i class="bi bi-credit-card me-2"></i>Confirm Booking
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add JavaScript to calculate the total price based on dates
        document.addEventListener('DOMContentLoaded', function() {
            const startDate = document.getElementById('start_date');
            const endDate = document.getElementById('end_date');
            const pricePerNight = {{ $apartment->price }};

            function calculateTotal() {
                if (startDate.value && endDate.value) {
                    const start = new Date(startDate.value);
                    const end = new Date(endDate.value);
                    const diffTime = Math.abs(end - start);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

                    document.getElementById('nights-count').textContent = diffDays;
                    const total = diffDays * pricePerNight;
                    document.getElementById('total-price').textContent = '$' + total.toFixed(2);
                    document.getElementById('grand-total').textContent = '$' + total.toFixed(2);
                }
            }

            startDate.addEventListener('change', calculateTotal);
            endDate.addEventListener('change', calculateTotal);
        });
    </script>
@endsection
