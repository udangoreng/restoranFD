<!DOCTYPE html>
<html>
<head>
    <title>Reservation Confirmed</title>
</head>
<body>
    <h1>Reservation Confirmed!</h1>
    <p>Dear {{ $reservation->salutation }} {{ $reservation->first_name }} {{ $reservation->last_name }},</p>
    
    <p>Your reservation at {{ config('app.name') }} has been confirmed.</p>
    
    <h3>Reservation Details:</h3>
    <ul>
        <li><strong>Reservation Code:</strong> {{ $reservation->reservation_code }}</li>
        <li><strong>Date:</strong> {{ \Carbon\Carbon::parse($reservation->booking_date)->format('d M Y') }}</li>
        <li><strong>Time:</strong> {{ $reservation->time_in }} - {{ $reservation->time_out }}</li>
        <li><strong>Number of Guests:</strong> {{ $reservation->person_attend }}</li>
        @if($reservation->table)
        <li><strong>Table:</strong> Table #{{ $reservation->table->id }} ({{ $reservation->table->capacity }} seats)</li>
        @endif
    </ul>
    
    <p>We look forward to serving you!</p>
    
    <p>Best regards,<br>
    {{ config('app.name') }} Team</p>
</body>
</html>