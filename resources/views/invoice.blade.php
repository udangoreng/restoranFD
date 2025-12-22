<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice - {{ $reservation->reservation_code }}</title>
    <style>
        @page {
            margin: 50px 40px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            line-height: 1.5;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #d4af37;
            padding-bottom: 20px;
        }

        .restaurant-name {
            font-size: 28px;
            font-weight: bold;
            color: #000;
            margin: 0;
        }

        .tagline {
            font-size: 14px;
            color: #666;
            margin: 5px 0 15px;
        }

        .invoice-title {
            font-size: 20px;
            color: #000;
            margin: 10px 0;
        }

        .invoice-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .info-box {
            width: 48%;
        }

        .info-box p {
            display: flex;
            justify-content: space-between;
            margin: 8px 0;
            padding: 5px 0;
            border-bottom: 1px solid #eee;
        }

        .info-box span:first-child {
            font-weight: bold;
        }

        .status {
            background-color: #d4ffd4;
            padding: 5px 10px;
            border-radius: 4px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        .payment-summary {
            margin: 30px 0;
        }

        .summary-box {
            max-width: 400px;
            margin-left: auto;
        }

        .row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
        }

        .grand-total {
            font-weight: bold;
            font-size: 16px;
            border-top: 2px solid #333;
            padding-top: 10px;
        }

        .dp {
            color: #d4af37;
            font-weight: bold;
        }

        .remaining {
            font-weight: bold;
            color: #333;
        }

        .special-request {
            margin: 20px 0;
        }

        .special-request ul {
            padding-left: 20px;
        }

        .terms-section {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }

        .signature-block {
            text-align: center;
            margin-top: 40px;
        }

        .signature-line {
            width: 200px;
            height: 1px;
            background-color: #000;
            margin: 20px auto;
        }

        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 10px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1 class="restaurant-name">Courvoiser Fine Dining</h1>
        <p class="tagline">Fine Dining with a Modern Twist</p>
        <h2 class="invoice-title">Reservation Confirmation</h2>
    </div>

    <section class="invoice-info">
        <div class="info-box">
            <p><span>Invoice Number</span><span>{{ $invoiceNumber }}</span></p>
            <p><span>Reservation ID</span><span>{{ $reservation->reservation_code }}</span></p>
            <p><span>Invoice Date</span><span>{{ $invoiceDate }}</span></p>
            <p><span>Payment Method</span><span>{{ $order->payment_type ?? 'Down Payment' }}</span></p>
            <p class="status">
                <span>Status</span>
                <span>
                    @if ($order->down_payment_paid ?? false)
                        DP Paid
                    @elseif($order->status == 'Completed')
                        Paid in Full
                    @else
                        Pending
                    @endif
                </span>
            </p>
        </div>

        <div class="info-box">
            <p><span>Guest Name</span><span>{{ $reservation->salutation }} {{ $reservation->first_name }}
                    {{ $reservation->last_name }}</span></p>
            <p><span>Phone</span><span>{{ $reservation->phone }}</span></p>
            <p><span>Guests</span><span>{{ $reservation->person_attend }} Persons</span></p>
            <p><span>Date</span><span>{{ \Carbon\Carbon::parse($reservation->booking_date)->format('j F Y') }}</span>
            </p>
            <p><span>Time</span><span>{{ \Carbon\Carbon::parse($reservation->time_in)->format('H:i A') }}</span></p>
        </div>
    </section>

    @if ($order)
        <section class="order-section">
            <h3>Ordered Menu</h3>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Item Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->carts as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->menu->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>IDR {{ number_format($item->price, 0, ',', '.') }}</td>
                            <td>IDR {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        <section class="payment-summary">
            <div class="summary-box">
                <div class="row"><span>Subtotal</span><span>IDR {{ number_format($subtotal, 0, ',', '.') }}</span>
                </div>
                <div class="row"><span>Tax ({{ $taxRate }}%)</span><span>IDR
                        {{ number_format($tax, 0, ',', '.') }}</span></div>

                <div style="height: 10px; margin: 10px 0;"></div>

                <div class="row grand-total"><span>Grand Total</span><span>IDR
                        {{ number_format($grandTotal, 0, ',', '.') }}</span></div>
                @if ($order->down_payment_amount > 0)
                    <div class="row dp"><span>Down Payment (50%)</span><span>IDR
                            {{ number_format($downPayment, 0, ',', '.') }}</span></div>
                    <div class="row remaining"><span>Remaining Balance</span><span>IDR
                            {{ number_format($remaining, 0, ',', '.') }}</span></div>
                @endif
            </div>
        </section>
    @endif

    <section class="special-request">
        @if ($reservation->request)
            <h4>Special Requests</h4>
            <p>{{ $reservation->request }}</p>
        @endif

        @if ($reservation->allergies)
            <h4>Allergies</h4>
            <p>{{ $reservation->allergies }}</p>
        @endif
    </section>

    <section class="terms-section">
        <div style="margin-bottom: 20px;">
            <p>• Reservation will be held for 15 minutes after the scheduled time.</p>
            <p>• Down payment is non-refundable within 24 hours before reservation time.</p>
        </div>

        <div class="signature-block">
            <p style="margin-bottom: 20px;">Thank you for dining with us</p>
            <div class="signature-line"></div>
            <p style="font-weight: bold; margin-top: 10px;">COURVOISIER RESTAURANT</p>
            <p>Fine Dining Experience</p>
        </div>
    </section>

    <div class="footer">
        <p>Generated on {{ now()->format('Y-m-d H:i:s') }} | Courvoiser Fine Dining Restaurant</p>
    </div>
</body>

</html>
