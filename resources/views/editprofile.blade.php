<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

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
            padding: 20px
        }
        a {
            text-decoration: none;
            color: #f5f5f5;
        }

        .profile-container {
            padding: 20px;
        }

        .profile-box {
            max-width: 1200px;
            margin: auto;
            padding: 30px;
            border: 2px solid #d4af37;
            border-radius: 20px;
            background: rgba(12, 40, 36, 0.95);
        }

        .page-title {
            font-size: 28px;
            color: #e6c87a;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid rgba(212, 175, 55, 0.3);
        }

        .profile-layout {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 25px;
        }

        .profile-card {
            background: linear-gradient(180deg, #143c37, #0d2a26);
            border-radius: 18px;
            padding: 25px;
            border: 1px solid rgba(212, 175, 55, 0.3);
        }

        .profile-photo {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-photo img {
            width: 220px;
            height: 220px;
            border-radius: 50%;
            border: 3px solid #d4af37;
            object-fit: cover;
        }

        .profile-name {
            text-align: center;
            color: #e6c87a;
            margin-bottom: 20px;
        }

        .profile-about h4 {
            margin-bottom: 15px;
            color: #d4af37;
        }

        .about-list {
            list-style: none;
        }

        .about-list li {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .about-list i {
            color: #d4af37;
            width: 20px;
        }

        .profile-input {
            width: 100%;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(212, 175, 55, 0.35);
            border-radius: 10px;
            padding: 7px 12px;
            color: #f5f5f5;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .profile-input:focus {
            outline: none;
            border-color: #d4af37;
            box-shadow: 0 0 8px rgba(212, 175, 55, 0.4);
            background: rgba(255, 255, 255, 0.1);
        }

        .profile-input.profile-name {
            text-align: center;
            font-size: 18px;
            font-weight: 600;
            color: #e6c87a;
            margin-bottom: 20px;
        }

        .edit-btn {
            margin-top: 10px;
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
        }

        .edit-btn:hover {
            background: rgba(212, 175, 55, 0.3);
            transform: translateY(-2px);
        }

        .activity-card {
            background: linear-gradient(180deg, #143c37, #0d2a26);
            border-radius: 18px;
            padding: 25px;
            border: 1px solid rgba(212, 175, 55, 0.3);
        }

        .section-title {
            color: #e6c87a;
            margin-bottom: 25px;
            font-size: 22px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 25px 0 15px;
        }

        .section-subtitle {
            color: #d4af37;
            font-size: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-subtitle.history {
            color: #3cb371;
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
            border: none;
            transition: all 0.3s ease;
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

        .detail-btn:hover {
            transform: translateY(-2px);
        }


        .reservation-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .reservation-item {
            background: linear-gradient(180deg, #163f3a, #0c2f2a);
            border-radius: 16px;
            padding: 20px;
            border: 1px solid rgba(212, 175, 55, 0.25);
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
            align-items: center;
            margin-bottom: 15px;
        }

        .reservation-id {
            font-size: 14px;
            color: #e6c87a;
        }

        .status {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 6px;
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

        @media (max-width: 1024px) {
            .profile-layout {
                grid-template-columns: 1fr;
            }

            .profile-card {
                max-width: 400px;
                margin: auto;
            }
        }

        @media (max-width: 768px) {
            .profile-box {
                padding: 20px;
            }

            .page-title {
                font-size: 24px;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }

        .reservation-body p {
            margin-bottom: 10px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .reservation-body i {
            color: #d4af37;
            width: 16px;
        }

        .profile-action {
            display: flex;
            justify-content: flex-end;
            margin-top: 15px;
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
                @if ($errors->any())
                    @include('layout.popup.error_popup')
                @endif

                <h1 class="page-title">Edit Profile</h1>

                <div class="profile-layout">
                    <aside class="profile-card">
                        <div class="profile-photo">
                            <img src="{{ Storage::disk('public')->exists($user->profile_img_path) ? asset('storage/'. $user->profile_img_path) : asset($user->profile_img_path) }}" alt="{{ $user->name }}" height="150px"
                                alt="Profile Photo">
                        </div>

                        <form action="{{ route('profile.edit', $userdata->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <input type="text" class="profile-input profile-name" name="name"
                                value="{{ $userdata->name }}">

                            <div class="profile-about">
                                <h4>Personal Information</h4>
                                <ul class="about-list">
                                    <li>
                                        <i class="fa-solid fa-address-card"></i>
                                        <input type="text" name="username" class="profile-input"
                                            value="{{ $userdata->username }}">
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-cake-candles"></i>
                                        <input type="date" name="birthday" class="profile-input"
                                            value="{{ $userdata->birthday != null ? $userdata->birthday : 0 }}">
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-at"></i>
                                        <input type="tel" name="email" class="profile-input"
                                            value="{{ $userdata->email }}">
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-phone"></i>
                                        <input type="tel" name="phone" class="profile-input"
                                            value="{{ $userdata->phone }}">
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-camera"></i>
                                        <input type="file" class="profile-input" name="profile_img_path">
                                    </li>
                                </ul>

                                <div class="profile-action">
                                    <button class="edit-btn" type="submit">
                                        <i class="fa-solid fa-floppy-disk"></i> Save
                                    </button>
                                </div>
                            </div>
                        </form>
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
