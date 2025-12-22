<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courvoisier - My History</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #0a1f1c;
            color: #e8e4dc;
            line-height: 1.6;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: linear-gradient(135deg, #0a1f1c 0%, #18312E 100%);
        }

        .reservation-container {
            width: 100%;
            max-width: 1200px;
        }

        .reservation-box {
            background-color: #18312E;
            border-radius: 16px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.25);
            padding: 40px;
            border: 2px solid #c89b3c;
            position: relative;
            overflow: hidden;
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
            overflow: hidden;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
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

        .reservation-id {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .id-label {
            font-size: 12px;
            color: #b0a48a;
            text-transform: uppercase;
            letter-spacing: 1px;
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

        .status-completed {
            background-color: rgba(46, 204, 113, 0.2);
            color: #2ecc71;
            border: 1px solid #27ae60;
        }

        .reservation-content {
            display: flex;
            padding: 20px;
            gap: 20px;
        }

        .reservation-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .info-group {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .info-label {
            display: flex;
            align-items: center;
            gap: 8px;
            min-width: 120px;
            color: #e6c780;
            font-weight: 600;
            font-size: 14px;
        }

        .info-label i {
            color: #c89b3c;
        }

        .info-value {
            color: #d1ccc3;
            font-size: 15px;
            flex: 1;
        }

        .detail-button-container {
            display: flex;
            justify-content: flex-end;
            padding: 0 20px 15px 20px;
        }

        .detail-button {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            background: linear-gradient(to right, #c89b3c, #e6c780);
            color: #0a1f1c;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 3px 8px rgba(200, 155, 60, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.3px;
            height: 32px;
        }

        .detail-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(200, 155, 60, 0.4);
            background: linear-gradient(to right, #e6c780, #f0d9a0);
        }

        .detail-button:active {
            transform: translateY(0);
            box-shadow: 0 2px 5px rgba(200, 155, 60, 0.3);
        }

        .detail-button i {
            font-size: 11px;
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

            .detail-button-container {
                justify-content: center;
                padding: 0 20px 15px 20px;
            }

            .detail-button {
                padding: 6px 16px;
            }
        }

        @media (max-width: 576px) {
            .info-group {
                flex-direction: column;
                gap: 5px;
            }

            .detail-button {
                width: auto;
                justify-content: center;
                padding: 6px 20px;
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
        <div class="reservation-box">

            <h1 class="page-title">My History</h1>

            <div class="reservation-list">
                @if (count($reservation) == 0 )
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
    </main>

</body>

</html>
