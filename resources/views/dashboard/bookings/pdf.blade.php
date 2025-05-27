<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bookings Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .header { text-align: center; margin-bottom: 20px; }
        .badge { padding: 3px 6px; border-radius: 3px; font-size: 12px; }
        .badge-success { background-color: #28a745; color: white; }
        .badge-warning { background-color: #ffc107; color: black; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Bookings Report</h1>
        <p>Generated on: {{ now()->format('M d, Y H:i:s') }}</p>
    </div>

    <table>
        <thead>
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
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->apartment->name }}</td>
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
            @endforeach
        </tbody>
    </table>
</body>
</html>