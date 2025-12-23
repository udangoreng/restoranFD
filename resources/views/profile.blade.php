<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: radial-gradient(circle at top, #0f2b28, #071a18);
            color: #f5f5f5;
            min-height: 100vh;
            padding: 20px;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: #f5f5f5;
        }

        .profile-container {
            padding: 20px;
            width: 100%;
        }

        .profile-box {
            max-width: 1200px;
            margin: 0 auto;
            border: 2px solid #d4af37;
            border-radius: 20px;
            padding: 30px;
            background: rgba(12, 40, 36, 0.95);
            overflow: hidden;
        }

        .page-title {
            font-size: 28px;
            color: #e6c87a;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid rgba(212, 175, 55, 0.3);
            word-wrap: break-word;
        }

        .profile-layout {
            display: grid;
            grid-template-columns: minmax(280px, 300px) 1fr;
            gap: 25px;
        }

        .profile-card {
            background: linear-gradient(180deg, #143c37, #0d2a26);
            border-radius: 18px;
            padding: 25px;
            border: 1px solid rgba(212, 175, 55, 0.3);
            width: 100%;
        }

        .profile-photo {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-photo img {
            width: 100%;
            max-width: 220px;
            height: 220px;
            border-radius: 50%;
            border: 3px solid #d4af37;
            object-fit: cover;
            aspect-ratio: 1/1;
        }

        .profile-name {
            text-align: center;
            color: #e6c87a;
            margin-bottom: 20px;
            font-size: clamp(20px, 2vw, 24px);
            word-break: break-word;
            padding: 0 5px;
        }

        .profile-about h4 {
            margin-bottom: 15px;
            color: #d4af37;
            font-size: 18px;
        }

        .about-list {
            list-style: none;
        }

        .about-list li {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
            font-size: clamp(14px, 1.6vw, 16px);
            word-break: break-word;
        }

        .about-list i {
            color: #d4af37;
            width: 20px;
            flex-shrink: 0;
        }

        .activity-card {
            background: linear-gradient(180deg, #143c37, #0d2a26);
            border-radius: 18px;
            padding: 25px;
            border: 1px solid rgba(212, 175, 55, 0.3);
            width: 100%;
        }

        .section-title {
            color: #e6c87a;
            margin-bottom: 25px;
            font-size: clamp(20px, 2vw, 22px);
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 25px 0 15px 0;
            flex-wrap: wrap;
            gap: 15px;
        }

        .section-subtitle {
            color: #d4af37;
            font-size: clamp(16px, 1.8vw, 18px);
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .section-subtitle.history {
            color: #3cb371;
        }

        .section-subtitle i {
            font-size: 16px;
            flex-shrink: 0;
        }

        .detail-btn {
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            border: none;
            white-space: nowrap;
        }

        .detail-btn a {
            display: flex;
            align-items: center;
            gap: 8px;
            width: 100%;
            height: 100%;
        }

        .detail-btn.active-btn {
            background: rgba(212, 175, 55, 0.15);
            color: #d4af37;
            border: 1px solid #d4af37;
        }

        .detail-btn.history-btn {
            background: rgba(60, 179, 113, 0.15);
            color: #3cb371;
            border: 1px solid #3cb371;
        }

        .detail-btn.active-btn:hover {
            background: rgba(212, 175, 55, 0.25);
            transform: translateY(-2px);
        }

        .detail-btn.history-btn:hover {
            background: rgba(60, 179, 113, 0.25);
            transform: translateY(-2px);
        }

        .reservation-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 100%;
        }

        .reservation-list.history {
            opacity: 0.9;
        }

        .reservation-item {
            background: linear-gradient(180deg, #163f3a, #0c2f2a);
            border-radius: 16px;
            padding: 20px;
            border: 1px solid rgba(212, 175, 55, 0.25);
            width: 100%;
        }

        .reservation-item.active {
            border-left: 4px solid #d4af37;
        }

        .reservation-item.history {
            border-left: 4px solid #3cb371;
        }

        .reservation-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .reservation-id {
            font-size: clamp(13px, 1.4vw, 14px);
            color: #e6c87a;
            word-break: break-word;
        }

        .status {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 6px;
            flex-shrink: 0;
        }

        .status.active {
            background: rgba(212, 175, 55, 0.15);
            color: #d4af37;
            border: 1px solid #d4af37;
        }

        .status.history {
            background: rgba(60, 179, 113, 0.15);
            color: #3cb371;
            border: 1px solid #3cb371;
        }

        .reservation-body p {
            margin-bottom: 10px;
            font-size: clamp(13px, 1.4vw, 14px);
            display: flex;
            align-items: flex-start;
            gap: 8px;
            flex-wrap: wrap;
        }

        .reservation-body i {
            color: #d4af37;
            width: 16px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .reservation-body strong {
            margin-right: 5px;
        }

        .edit-btn {
            margin-left: auto;
            background: rgba(212, 175, 55, 0.15);
            color: #d4af37;
            border: 1px solid #d4af37;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .edit-btn a {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #d4af37;
        }

        .edit-btn:hover {
            background: rgba(212, 175, 55, 0.3);
            transform: translateY(-2px);
        }

        @media (max-width: 1100px) {
            .profile-layout {
                grid-template-columns: minmax(250px, 280px) 1fr;
                gap: 20px;
            }
        }

        @media (max-width: 900px) {
            .profile-layout {
                grid-template-columns: 1fr;
                max-width: 600px;
                margin: 0 auto;
            }

            .profile-card {
                max-width: 100%;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 15px;
            }

            .profile-container {
                padding: 15px 10px;
            }

            .profile-box {
                padding: 20px 15px;
                border-radius: 15px;
            }

            .page-title {
                font-size: 24px;
                text-align: center;
            }

            .profile-photo img {
                max-width: 200px;
                height: 200px;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
                margin: 20px 0 10px 0;
            }

            .detail-btn {
                align-self: stretch;
                justify-content: center;
            }

            .reservation-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .status {
                align-self: flex-start;
            }

            .section-title {
                font-size: 20px;
                text-align: center;
            }

            .section-subtitle {
                font-size: 17px;
            }

            .about-list li {
                font-size: 15px;
            }

            .reservation-body p {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .profile-container {
                padding: 10px 5px;
            }

            .profile-box {
                padding: 15px 10px;
                border-width: 1px;
            }

            .page-title {
                font-size: 22px;
                margin-bottom: 20px;
            }

            .profile-photo img {
                max-width: 180px;
                height: 180px;
            }

            .profile-name {
                font-size: 20px;
            }

            .profile-card,
            .activity-card {
                padding: 20px 15px;
            }

            .section-title {
                font-size: 19px;
            }

            .section-subtitle {
                font-size: 16px;
            }

            .detail-btn {
                padding: 8px 16px;
                font-size: 13px;
            }

            .reservation-item {
                padding: 15px;
            }

            .reservation-id {
                font-size: 13px;
            }

            .edit-btn {
                padding: 5px 12px;
                font-size: 11px;
            }

            .about-list li {
                font-size: 14px;
            }
        }

        @media (max-width: 360px) {
            .profile-photo img {
                max-width: 160px;
                height: 160px;
            }

            .page-title {
                font-size: 20px;
            }

            .profile-name {
                font-size: 18px;
            }

            .detail-btn {
                width: 100%;
                justify-content: center;
            }

            .section-subtitle {
                font-size: 15px;
            }

            .profile-about h4 {
                font-size: 16px;
            }

            .about-list li {
                font-size: 13px;
            }
        }

        @media print {
            body {
                background: white;
                color: black;
                padding: 0;
            }

            .profile-box {
                border: 1px solid #ccc;
                background: white;
                color: black;
            }

            .detail-btn,
            .edit-btn {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <main class="profile-container">
        <div class="profile-box">
            @if (!$userdata)
                @include('layout.popup.login_popup')
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const modal = document.getElementById("loginInfoModal");
                        modal.style.display = "flex";
                    });
                    const understoodBtn = document.getElementById('closeLoginInfoModal');
                    understoodBtn.addEventListener('click', function() {
                        modal.style.display = none;
                        setTimeout(() => {
                            window.location.href = "{{ route('auth.login') }}";
                        }, 1000);
                    });
                </script>
            @endif
            @auth
                <h1 class="page-title">My Profile</h1>
                <div class="profile-layout">
                    <aside class="profile-card">
                        <div class="profile-photo">
                            <img src="{{ Storage::disk('public')->exists($userdata->profile_img_path) ? asset('storage/' . $userdata->profile_img_path) : asset($userdata->profile_img_path) }}"
                                alt="Profile Photo">
                        </div>
                        <h2 class="profile-name">{{ $userdata->name }}</h2>
                        <div class="profile-about">
                            <h4>Personal Information</h4>
                            <ul class="about-list">
                                <li>
                                    <i class="fa-solid fa-address-card"></i>
                                    <span>{{ $userdata->username }}</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-cake-candles"></i>
                                    <span>{{ $userdata->birthday != null ? $userdata->birthday : '-' }}</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-phone"></i>
                                    <span>{{ $userdata->phone }}</span>
                                </li>
                                <button class="edit-btn">
                                    <a href="{{ route('editprofile') }}" style="text-decoration: none; color:#d4af37">
                                        <i class="fa-solid fa-pen"></i> Edit
                                    </a>
                                </button>
                            </ul>
                        </div>
                    </aside>

                    <section class="activity-card">
                        <h3 class="section-title">Activities</h3>
                        <div class="section-header">
                            <h4 class="section-subtitle">
                                <i class="fa-solid fa-clock"></i> Active Reservations
                                ({{ isset($reservation) ? $reservation->count() : '0' }})
                            </h4>
                            <button class="detail-btn active-btn">
                                <a href="{{ route('reservation.see') }}">
                                    <i class="fa-solid fa-arrow-right"></i> Detail
                                </a>
                            </button>
                        </div>
                        <div class="reservation-list">
                            <div class="reservation-item active">
                                @if (!isset($reservation))
                                    <p class="reservation-id">You haven't make any reservation with us Yet</p>
                                @else
                                    <div class="reservation-header">
                                        <span class="reservation-id">RESERVATION ID:
                                            <strong>{{ $reservation->reservation_code }}</strong></span>
                                        <span class="status active">
                                            <i class="fa-solid fa-clock"></i> {{ $reservation->status }}
                                        </span>
                                    </div>
                                    <div class="reservation-body">
                                        <p>
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <strong>Date & Time:</strong>
                                            {{ \Carbon\Carbon::parse($reservation->booking_date)->format('j F Y') }} •
                                            {{ \Carbon\Carbon::parse($reservation->time_in)->format('H:i A') }}</span>
                                        </p>
                                        <p>
                                            <i class="fa-solid fa-user-group"></i>
                                            <strong>Guests:</strong>
                                            {{ $reservation->person_attend }} Persons
                                        </p>
                                        <p>
                                            <i class="fa-solid fa-phone"></i>
                                            <strong>Contact:</strong>
                                            {{ $reservation->phone }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="section-header">
                            <h4 class="section-subtitle history">
                                <i class="fa-solid fa-history"></i> History
                                ({{ isset($history) ? $history->count() : '0' }})
                            </h4>
                            <button class="detail-btn history-btn">
                                <a href="{{ route('history.see') }}">
                                    <i class="fa-solid fa-arrow-right"></i> Detail
                                </a>
                            </button>
                        </div>
                        <div class="reservation-list history">
                            <div class="reservation-item history">
                                @if (!isset($history))
                                    <p class="reservation-id">You haven't make any reservation with us Yet</p>
                                @else
                                    <div class="reservation-header">
                                        <span class="reservation-id">RESERVATION ID:
                                            <strong>{{ $history->reservation_code }}</strong></span>
                                        <span class="status history">
                                            <i class="fa-solid fa-check"></i> {{ $history->status }}
                                        </span>
                                    </div>
                                    <div class="reservation-body">
                                        <p>
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <strong>Date & Time:</strong>
                                            {{ \Carbon\Carbon::parse($history->booking_date)->format('j F Y') }} •
                                            {{ \Carbon\Carbon::parse($history->time_in)->format('H:i A') }}</span>
                                        </p>
                                        <p>
                                            <i class="fa-solid fa-user-group"></i>
                                            <strong>Guests:</strong>
                                            {{ $history->person_attend }} Persons
                                        </p>
                                        <p>
                                            <i class="fa-solid fa-phone"></i>
                                            <strong>Contact:</strong>
                                            {{ $history->phone }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </section>
                </div>
            @endauth
        </div>
    </main>
</body>

</html>
