<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('{{ asset('img/background.jpeg') }}') center/cover no-repeat fixed;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .reservasi-wrapper {
            width: 90%;
            max-width: 900px;
            background: rgba(0, 40, 30, 0.92);
            padding: 40px;
            border-radius: 8px;
            border: 2px solid #d4a64f;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
            color: white;
        }

        .reservasi-wrapper .subtitle {
            text-transform: uppercase;
            letter-spacing: 3px;
            text-align: center;
            color: #d4a64f;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .reservasi-wrapper h1 {
            text-align: center;
            margin: 0 0 10px;
            font-size: 40px;
        }

        .reservasi-wrapper p.info {
            text-align: center;
            margin-bottom: 30px;
            opacity: .8;
        }

        .reservasi-wrapper p.info a {
            color: #e4ad53;
            text-decoration: none;
        }

        .reservasi-wrapper p.info a:hover {
            text-decoration: underline;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-row-triple {
            grid-template-columns: 1fr 1fr 1fr;
        }

        .input-box {
            background: rgba(0, 30, 20, 0.7);
            padding: 15px;
            border: 1px solid #0f3a2c;
            border-radius: 6px;
            color: white;
            display: flex;
            align-items: center;
        }

        .input-box input,
        .input-box select,
        .input-box textarea {
            width: 100%;
            padding: 5px;
            background: transparent;
            border: none;
            color: white;
            outline: none;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
        }

        .input-box input::placeholder,
        .input-box textarea::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .input-box select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23d4a64f' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 8px center;
            background-size: 16px;
            padding-right: 30px;
        }

        .input-box select option {
            background: #001e14;
            color: white;
            padding: 10px;
        }

        .input-box select option:disabled {
            color: rgba(255, 255, 255, 0.5);
            font-style: italic;
        }

        textarea {
            height: 130px;
            resize: none;
        }

        .button-submit {
            background: #e4ad53;
            color: #000;
            padding: 16px;
            font-weight: bold;
            text-align: center;
            border-radius: 6px;
            margin-top: 10px;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 2px;
            border: none;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .button-submit:hover {
            background: #d19940;
            transform: translateY(-2px);
        }

        select:invalid {
            color: rgba(255, 255, 255, 0.5);
        }

        @media (max-width: 768px) {
            .reservasi-wrapper {
                width: 95%;
                padding: 25px;
            }

            .reservasi-wrapper h1 {
                font-size: 32px;
            }

            .form-row,
            .form-row-triple {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .input-box select {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="reservasi-wrapper">
        <div class="subtitle">✦︎ Online Reservation ✦︎</div>
        <h1>Book A Table</h1>
        <p class="info" style="margin-bottom: 0.75rem !important">
            Booking request <a href="#">+62-812-34567890</a> or fill out the order form
        </p>
        <p class="info">*For Group Reservation more than 10 people, please contact
            courvoiser@booking.com, or call on +62-812-34567890 </p>

        <form>
            <div class="d-flex">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="option1">
                    <label class="form-check-label" for="inlineRadio1">Ms.</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="option2">
                    <label class="form-check-label" for="inlineRadio2">Mr.</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3"
                        value="option3">
                    <label class="form-check-label" for="inlineRadio3">Mx.</label>
                </div>
            </div>
            <div class="form-row">
                <div class="input-box">
                    <input type="text" placeholder="First Name">
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Last Name">
                </div>
            </div>
            <div class="form-row">
                <div class="input-box">
                    <input type="email" placeholder="Email Address">
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Phone Number">
                </div>
            </div>
            <div class="form-row">
                <div class="input-box">
                    <select>
                        <option>1 Person</option>
                        <option>2 Person</option>
                        <option>3 Person</option>
                        <option>4 Person</option>
                        <option>5 Person</option>
                        <option>6 Person</option>
                        <option>7 Person</option>
                        <option>8 Person</option>
                        <option>9 Person</option>
                        <option>10 Person</option>
                    </select>
                </div>
                <div class="input-box">
                    <input type="date" id="#date" min="<?php echo date("Y-m-d"); ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="input-box">
                    <select>
                        <option>08:00 AM</option>
                        <option>09:00 AM</option>
                        <option>10:00 AM</option>
                        <option>11:00 AM</option>
                        <option>12:00 PM</option>
                        <option>01:00 PM</option>
                        <option>02:00 PM</option>
                        <option>03:00 PM</option>
                        <option>04:00 PM</option>
                        <option>05:00 PM</option>
                        <option>06:00 PM</option>
                        <option>07:00 PM</option>
                        <option>08:00 PM</option>
                        <option>09:00 PM</option>
                        <option>10:00 PM</option>
                    </select>
                </div>
                <div class="input-box">
                    <select>
                        <option value="" disabled selected>Request</option>
                        <option>Non Smoking</option>
                        <option>Smoking Outdoor</option>
                        <option>Smoking Lounge</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="input-box">
                    <select>
                        <option value="" disabled selected>Are you making reservation for?</option>
                        <option>Myself</option>
                        <option>Someone Else</option>
                    </select>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Food Allergies">
                </div>
            </div>
            <div class="input-box">
                <textarea placeholder="Message"></textarea>
            </div>
            <button class="button-submit">Book A Table</button>
        </form>
    </div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(function() {
            $("#date").datepicker({
                minDate: new Date()
            });
        });
    </script>
</body>

</html>
