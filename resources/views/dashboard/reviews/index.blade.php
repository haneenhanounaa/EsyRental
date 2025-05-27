@extends('dashboard.index')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">All Reviews</h4>
                </div>

                <div class="card-body">
                    <a href="{{ route('reviews.export.pdf') }}" class="btn btn-primary mb-3">
                        <i class="fas fa-file-pdf"></i> Export to PDF
                    </a>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Apartment</th>
                                    <th>User</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($reviews as $review)
                                    <tr>
                                        <td>{{ $review->id }}</td>
                                        <td>{{ $review->apartment->title ?? 'N/A' }}</td>
                                        <td>{{ $review->user->name ?? 'N/A' }}</td>
                                        <td>{{ $review->rating }}/5</td>
                                        <td>{{ $review->comment }}</td>
                                        <td>{{ $review->created_at->format('M d, Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No reviews found</td>
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
