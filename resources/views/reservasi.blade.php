<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi</title>
    <style>
        body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
     background: url('{{ asset("img/background.jpeg") }}') center/cover no-repeat fixed;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.reservasi-wrapper {
    width: 40%;
    max-width: 900px;
    background: rgba(0, 40, 30, 0.92);
    padding: 40px;
    border-radius: 8px;
    border: 2px solid #d4a64f;
    box-shadow: 0 0 20px rgba(0,0,0,0.4);
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

.input-box {
    background: rgba(0, 30, 20, 0.7);
    padding: 15px;
    border: 1px solid #0f3a2c;
    border-radius: 6px;
    color: white;
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
}

.input-box option{
    background-color: #333 !important;
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
}

.button-submit:hover {
    background: #d19940;
}

    </style>
</head>

<body>
    <div class="reservasi-wrapper">
        <div class="subtitle">✦︎Online Reservation✦︎</div>
        <h1>Book A Table</h1>
        <p class="info">
            Booking request <a href="#">+62-812-34567890</a> or fill out the order form
        </p>

        <form>

            <div class="form-row">
                <div class="input-box">
                    <input type="text" placeholder="Your Name">
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
                    </select>
                </div>

                <div class="input-box">
                    <input type="date">
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
            </div>

            <div class="input-box">
                <textarea placeholder="Message"></textarea>
            </div>

            <button class="button-submit">Book A Table</button>

        </form>

    </div>

</body>
</html>
