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
        }

        .profile-container {
            padding: 20px;
        }

        .profile-box {
            max-width: 1200px;
            margin: auto;
            border: 2px solid #d4af37;
            border-radius: 20px;
            padding: 30px;
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
            margin: 25px 0 15px 0;
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

        .section-subtitle i {
            font-size: 16px;
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
        }

        .reservation-list.history {
            opacity: 0.9;
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


        @media (max-width: 1024px) {
            .profile-layout {
                grid-template-columns: 1fr;
            }

            .profile-card {
                max-width: 400px;
                margin: 0 auto;
            }
        }

        @media (max-width: 768px) {
            .profile-container {
                padding: 15px;
            }

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
                margin: 20px 0 10px 0;
            }

            .detail-btn {
                align-self: flex-start;
            }

            .reservation-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .section-title {
                font-size: 20px;
            }

            .section-subtitle {
                font-size: 16px;
            }
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
        }

        .edit-btn:hover {
            background: rgba(212, 175, 55, 0.3);
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <main class="profile-container">
        <div class="profile-box">
            <h1 class="page-title">My Profile</h1>
            <div class="profile-layout">
                <aside class="profile-card">
                    <div class="profile-photo">
                        <img src="{{ asset('img/fotoprofil.jpeg') }}" alt="">
                    </div>
                    <h2 class="profile-name">Princy Timberlake</h2>
                    <div class="profile-about">
                        <h4>Personal Information</h4>
                        <ul class="about-list">
                            <li>
                                <i class="fa-solid fa-address-card"></i>
                                <span>prncss</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-cake-candles"></i>
                                <span>03 Jan 1997</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-phone"></i>
                                <span>0812-3456-7890</span>
                            </li>
                            <button class="edit-btn">
                                <a href="{{ route('editprofil', 2) }}" style="text-decoration: none; color:#d4af37">
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
                            <i class="fa-solid fa-clock"></i> Active Reservations (3)
                        </h4>
                        <button class="detail-btn active-btn">
                            <i class="fa-solid fa-arrow-right"></i> Detail
                        </button>
                    </div>
                    <div class="reservation-list">
                        <div class="reservation-item active">
                            <div class="reservation-header">
                                <span class="reservation-id">RESERVATION ID: <strong>#RSV-20251207-0098</strong></span>
                                <span class="status active">
                                    <i class="fa-solid fa-clock"></i> ACTIVE
                                </span>
                            </div>
                            <div class="reservation-body">
                                <p>
                                    <i class="fa-solid fa-calendar-days"></i>
                                    <strong>Date & Time:</strong>
                                    Friday, 30 Dec 2025 • 19:00
                                </p>
                                <p>
                                    <i class="fa-solid fa-user-group"></i>
                                    <strong>Guests:</strong>
                                    4 Persons
                                </p>
                                <p>
                                    <i class="fa-solid fa-phone"></i>
                                    <strong>Contact:</strong>
                                    0812-3456-7890
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="section-header">
                        <h4 class="section-subtitle history">
                            <i class="fa-solid fa-history"></i> History (3)
                        </h4>
                        <button class="detail-btn history-btn">
                            <i class="fa-solid fa-arrow-right"></i> Detail
                        </button>
                    </div>
                    <div class="reservation-list history">
                        <div class="reservation-item history">
                            <div class="reservation-header">
                                <span class="reservation-id">RESERVATION ID: <strong>#RSV-20451207-0088</strong></span>
                                <span class="status history">
                                    <i class="fa-solid fa-check"></i> COMPLETED
                                </span>
                            </div>
                            <div class="reservation-body">
                                <p>
                                    <i class="fa-solid fa-calendar-days"></i>
                                    <strong>Date & Time:</strong>
                                    Saturday, 9 March 2024 • 20:30
                                </p>
                                <p>
                                    <i class="fa-solid fa-user-group"></i>
                                    <strong>Guests:</strong>
                                    6 Persons
                                </p>
                                <p>
                                    <i class="fa-solid fa-phone"></i>
                                    <strong>Contact:</strong>
                                    0812-3456-7890
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
</body>

</html>
