<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courvoisier - My Reservation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-image: linear-gradient(135deg, #0a1f1c 0%, #18312E 100%);
            color: #e8e4dc;
            line-height: 1.6;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .reservation-container {
            width: 100%;
            max-width: 1200px;
        }

        .reservation-box {
            background-color: #18312E;
            border-radius: 16px;
            padding: 40px;
            border: 2px solid #c89b3c;
            position: relative;
            overflow: hidden;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.25);
            animation: fadeIn 0.6s ease-out;
        }

        .reservation-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #c89b3c, #e6c780, #c89b3c);
        }

        .page-title {
            color: #e6c780;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid rgba(200, 155, 60, 0.4);
            font-family: 'Georgia', serif;
            position: relative;
        }

        .page-title::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100px;
            height: 2px;
            background-color: #c89b3c;
        }

        .reservation-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .reservation-card {
            background-color: rgba(10, 31, 28, 0.7);
            border-radius: 12px;
            border: 1px solid rgba(200, 155, 60, 0.3);
            backdrop-filter: blur(10px);
            transition: 0.3s;
            overflow: hidden;
            animation: fadeIn 0.4s ease-out;
        }

        .reservation-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(200, 155, 60, 0.2);
            border-color: #c89b3c;
        }

        .reservation-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: rgba(24, 49, 46, 0.9);
            border-bottom: 1px solid rgba(200, 155, 60, 0.2);
        }

        .id-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #b0a48a;
        }

        .id-value {
            font-size: 18px;
            font-weight: 700;
            color: #e6c780;
            font-family: 'Georgia', serif;
        }

        .reservation-status {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-active {
            background-color: rgba(241, 196, 15, 0.2);
            color: #f1c40f;
            border: 1px solid #d4ac0d;
        }

        .reservation-content {
            display: flex;
            padding: 20px;
            gap: 20px;
        }

        .reservation-info {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .info-group {
            display: flex;
            gap: 12px;
        }

        .info-label {
            gap: 8px;
            min-width: 120px;
            font-weight: 600;
            color: #e6c780;
            display: flex;
            align-items: center;
        }

        .info-label i {
            color: #c89b3c;
        }

        .info-value {
            color: #d1ccc3;
        }

        .empty-state-box {
            text-align: center;
            padding: 60px 20px;
            border: 1px dashed rgba(200, 155, 60, 0.3);
            border-radius: 12px;
            background-color: rgba(10, 31, 28, 0.4);
            margin-top: 20px;
        }

        .empty-icon {
            font-size: 60px;
            color: #c89b3c;
            opacity: 0.5;
            margin-bottom: 20px;
        }

        .empty-title {
            font-family: 'Georgia', serif;
            font-size: 24px;
            color: #e6c780;
            margin-bottom: 10px;
        }

        .empty-subtitle {
            color: #b0a48a;
            font-size: 16px;
            margin-bottom: 25px;
        }

        .btn-book-now {
            display: inline-block;
            padding: 10px 30px;
            border: 1px solid #c89b3c;
            color: #c89b3c;
            text-decoration: none;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
        }

        .btn-book-now:hover {
            background-color: #c89b3c;
            color: #18312E;
            box-shadow: 0 0 15px rgba(200, 155, 60, 0.4);
        }

        @media (max-width: 768px) {
            .reservation-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }

        @media (max-width: 576px) {
            .info-group {
                flex-direction: column;
                gap: 5px;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <main class="reservation-container">
        <div class="container">

            <div class="reservation-box">
                <h1 class="page-title">My Reservation</h1>

                <div class="reservation-list">
                    @if (count($reservation) == 0)
                        <div class="empty-state-box">
                            <div class="empty-icon">
                                <i class="far fa-calendar-times"></i>
                            </div>
                            <h3 class="empty-title">No Reservations Found</h3>
                            <p class="empty-subtitle">You haven't made any reservations with us yet.</p>

                            <a href="{{ route('reservation') }}" class="btn-book-now">
                                Book a Table
                            </a>
                        </div>
                    @endif
                    @foreach ($reservation as $item)
                        <div class="reservation-card active">
                            <div class="reservation-header">
                                <div>
                                    <span class="id-label">Reservation ID:</span>
                                    <span class="id-value">{{ $item->reservation_code }}</span>
                                </div>
                                <div class="reservation-status status-active">
                                    <i class="fas fa-clock"></i><span>{{ $item->status }}</span>
                                </div>
                            </div>

                            <div class="reservation-content">
                                <div class="reservation-info">
                                    <div class="info-group">
                                        <span class="info-label"><i class="fas fa-calendar-alt"></i>Date & Time:</span>
                                        <span class="info-value">
                                            {{ \Carbon\Carbon::parse($item->booking_date)->format('j F Y') }} •
                                            {{ \Carbon\Carbon::parse($item->time_in)->format('H:i A') }}</span>
                                    </div>
                                    <div class="info-group">
                                        <span class="info-label"><i class="fas fa-users"></i>Guests:</span>
                                        <span class="info-value">{{ $item->person_attend }} Persons</span>
                                    </div>
                                    <div class="info-group">
                                        <span class="info-label"><i class="fas fa-phone"></i>Contact:</span>
                                        <span class="info-value">{{ $item->phone }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </main>
</body>

</html>
