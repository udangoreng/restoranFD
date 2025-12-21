<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COURVOISER - Fine Dining Restaurant</title>
    <meta name="title" content="COURVOISER - Fine Dining Restaurant">

    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="invoice.css">

    <link rel="preload" as="image" href="slider-1.jpg">
    <link rel="preload" as="image" href="slider-2.jpg">
    <link rel="preload" as="image" href="slider-3.jpg">
</head>

<body>
    <div class="preload" data-preload> 
        <div class="circle"></div> 
        <p class="text">Courvoiser</p> 
    </div>

    <div class="invoice-container">

    <header class="invoice-header">
        <h1 class="restaurant-name">Courvoiser Fine Dining</h1>
        <p class="tagline">Fine Dining with a Modern Twist</p>
        <div class="divider-gold"></div>
        <h2 class="invoice-title">Reservation Comfirmation</h2>
    </header>

    <section class="invoice-info">
        <div class="info-box">
            <p><span>Invoice Number</span><span>INV-20251207-001</span></p>
            <p><span>Reservation ID</span><span>RSV-20251207-0098</span></p>
            <p><span>Invoice Date</span><span>07 December 2025</span></p>
            <p><span>Payment Method</span><span>Down Payment (50%)</span></p>
            <p class="status paid"><span>Status</span><span>DP Paid</span></p>
        </div>

        <div class="info-box">
            <p><span>Guest Name</span><span>Princy Timberlake</span></p>
            <p><span>Phone</span><span>+62 812-3456-7890</span></p>
            <p><span>Guests</span><span>4 Persons</span></p>
            <p><span>Date</span><span>25 December 2025</span></p>
            <p><span>Time</span><span>07:30 PM</span></p>
        </div>
    </section>

    <section class="order-section">
        <h3>Ordered Menu</h3>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Item Name</th>
                    <th>Notes</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Peach Bruschetta</td>
                    <td>-</td>
                    <td>1</td>
                    <td>IDR 140.000</td>
                    <td>IDR 140.000</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Herb Roasted Salmon</td>
                    <td>-</td>
                    <td>1</td>
                    <td>IDR 185.000</td>
                    <td>IDR 185.000</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Garlic Butter Lobster</td>
                    <td>-</td>
                    <td>1</td>
                    <td>IDR 320.000</td>
                    <td>IDR 320.000</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Caramel Pannacotta</td>
                    <td>-</td>
                    <td>1</td>
                    <td>IDR 105.000</td>
                    <td>IDR 105.000</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Lychee Rose Mocktail</td>
                    <td>Less sugar</td>
                    <td>2</td>
                    <td>IDR 73.000</td>
                    <td>IDR 146.000</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Lychee Rose Mocktail</td>
                    <td>No Ice</td>
                    <td>1</td>
                    <td>IDR 55.000</td>
                    <td>IDR 55.000</td>
                </tr>
            </tbody>
        </table>

        <p class="menu-note">
            Menu prices may be adjusted if additional orders are made during dine-in.
        </p>
    </section>

    <section class="payment-summary">
        <p class="payment-note">
            This invoice confirms a 50% down payment for your reservation.<br>
            The remaining balance is payable upon arrival at the restaurant during check-in.
        </p>

        <div class="summary-box">
            <div class="row"><span>Subtotal</span><span>IDR 951.000</span></div>
            <div class="row"><span>Tax (10%)</span><span>IDR 95.100</span></div>

            <div class="summary-divider"></div>

            <div class="row grand-total"><span>Grand Total</span><span>IDR 1.046.100</span></div>
            <div class="row dp"><span>Down Payment (50%)</span><span>IDR 523.050</span></div>
            <div class="row remaining"><span>Remaining Balance</span><span>IDR 523.050</span></div>
        </div>
    </section>

    <section class="special-request">
        <h4>Special Requests</h4>
        <ul>
            <li>Table near window</li>
            <li>Birthday setup (one small candle)</li>
            <li>Non-smoking area</li>
        </ul>

        <h4>Message from Guest</h4>
        <p class="guest-message">
            Please place the cake on the center table and dim lights around 9:00 PM.
            Thank you!
        </p>
    </section>

    <section class="terms-section letter-style">
        <div class="terms-left">
            <p>Reservation will be held for 15 minutes after the scheduled time.</p>
            <p>Down payment is non-refundable within 24 hours before reservation time.</p>
        </div>

        <div class="signature-block">
            <p class="thank-you">Thank you for dining with us</p>
            <div class="signature-line"></div>
            <p class="signature-name">COURVOISIER RESTAURANT</p>
            <p class="signature-tagline">Fine Dining Experience</p>
        </div>
    </section>

    </div>

    <script src="script.js"></script>
    <script src="cancel.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>