<!DOCTYPE html>
<html>
<head>
    <title>Reviews List</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>All Reviews</h2>
    <table>
        <thead>
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
            @foreach($reviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->apartment->title ?? 'N/A' }}</td>
                    <td>{{ $review->user->name ?? 'N/A' }}</td>
                    <td>{{ $review->rating }}/5</td>
                    <td>{{ $review->comment }}</td>
                    <td>{{ $review->created_at->format('M d, Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
