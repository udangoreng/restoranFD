@extends('layout.index')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body{
            height: 120% !important;
        }

        main {
            background-color: #0a1f1c;
            color: #e8e4dc;
            line-height: 1.6;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            min-height: 100vh;
            background-image: linear-gradient(135deg, #0a1f1c 0%, #18312E 100%);
        }

        .checkout-container {
            width: 100%;
            max-width: 1200px;
        }

        .container {
            width: 100%;
        }

        .checkout-box {
            background-color: #18312E;
            border-radius: 16px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.25);
            padding: 40px;
            border: 2px solid #c89b3c;
            position: relative;
            overflow: hidden;
        }

        .checkout-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #c89b3c, #e6c780, #c89b3c);
            z-index: 1;
        }

        .page-title {
            color: #e6c780;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 35px;
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

        .checkout-content {
            display: flex;
            gap: 40px;
        }

        .customer-details {
            flex: 1;
        }

        .order-section {
            flex: 1.2;
        }

        .divider {
            width: 1px;
            background: linear-gradient(to bottom, transparent, #c89b3c, transparent);
            margin: 0 10px;
        }

        .customer-details h2 {
            color: #e6c780;
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 25px;
            font-family: 'Georgia', serif;
            position: relative;
            display: inline-block;
        }

        .customer-details h2::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: #c89b3c;
        }

        .detail-group {
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(200, 155, 60, 0.2);
        }

        .detail-group:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .detail-label {
            font-weight: 600;
            color: #e6c780;
            margin-bottom: 8px;
            font-size: 15px;
        }

        .detail-value {
            color: #d1ccc3;
            font-size: 16px;
            line-height: 1.5;
        }

        .order-section h2 {
            color: #e6c780;
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 25px;
            font-family: 'Georgia', serif;
            position: relative;
            display: inline-block;
        }

        .order-section h2::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: #c89b3c;
        }

        .order-table {
            background-color: rgba(10, 31, 28, 0.7);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid rgba(200, 155, 60, 0.3);
            backdrop-filter: blur(10px);
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            padding-bottom: 15px;
            margin-bottom: 15px;
            border-bottom: 2px solid #c89b3c;
            font-weight: 600;
            color: #e6c780;
            font-size: 16px;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid rgba(200, 155, 60, 0.15);
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .product-info {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .product-name {
            font-weight: 500;
            color: #e6c780;
            font-size: 16px;
        }

        .product-quantity {
            color: #b0a48a;
            font-size: 14px;
            font-weight: 500;
        }

        .product-price {
            font-weight: 600;
            color: #e6c780;
            font-size: 16px;
        }

        .order-totals {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #c89b3c;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            font-size: 16px;
            color: #d1ccc3;
        }

        .grand-total {
            font-weight: 700;
            color: #e6c780;
            font-size: 20px;
        }

        .payment-method {
            background-color: rgba(10, 31, 28, 0.7);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            border-left: 5px solid #c89b3c;
            backdrop-filter: blur(10px);
        }

        .payment-method h3 {
            color: #e6c780;
            font-size: 18px;
            margin-bottom: 15px;
            font-family: 'Georgia', serif;
        }

        .payment-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(200, 155, 60, 0.2);
        }

        .payment-text {
            font-weight: 500;
            color: #e6c780;
            font-size: 16px;
        }

        .change-payment-btn {
            background: rgba(200, 155, 60, 0.2);
            border: 1px solid #c89b3c;
            color: #e6c780;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .change-payment-btn:hover {
            background: rgba(200, 155, 60, 0.3);
            transform: translateY(-2px);
        }

        .payment-method-selected {
            display: flex;
            align-items: center;
            font-weight: 500;
            color: #e6c780;
            font-size: 16px;
        }

        .payment-method-selected i {
            margin-right: 12px;
            color: #c89b3c;
            font-size: 20px;
        }

        .place-order-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #c89b3c, #e6c780, #c89b3c);
            color: #18312E;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.4s;
            margin-top: 10px;
            letter-spacing: 1px;
            font-family: 'Georgia', serif;
            text-transform: uppercase;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .place-order-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.7s;
            z-index: -1;
        }

        .place-order-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(200, 155, 60, 0.4);
            color: #0a1f1c;
        }

        .place-order-btn:hover::before {
            left: 100%;
        }

        @media (max-width: 900px) {
            .checkout-content {
                flex-direction: column;
                gap: 30px;
            }

            .divider {
                display: none;
            }

            .checkout-box {
                padding: 30px;
            }
        }

        @media (max-width: 576px) {
            body {
                padding: 15px;
                background: #0a1f1c;
            }

            .checkout-box {
                padding: 25px;
                border-width: 1px;
            }

            .page-title {
                font-size: 26px;
            }

            .order-table {
                padding: 20px;
            }

            .customer-details h2,
            .order-section h2 {
                font-size: 20px;
            }

            .place-order-btn {
                padding: 16px;
                font-size: 16px;
            }

            .change-payment-btn {
                padding: 6px 12px;
                font-size: 13px;
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

        .checkout-box {
            animation: fadeIn 0.6s ease-out;
        }

        .modal-content {
            background: linear-gradient(135deg, #18312E 0%, #2a4d48 100%);
            border-radius: 10px;
            padding-bottom: 20px;
            border: 2px solid #c89b3c;
        }

        .payment-header {
            text-align: center;
            width: 100%;
            font-size: 20px;
            font-weight: 600;
            color: #c89b3c;
        }

        .divider-modal {
            width: 90%;
            height: 2px;
            background: linear-gradient(90deg, transparent 0%, #c89b3c 50%, transparent 100%);
            margin: 10px auto 20px;
        }

        .method-box {
            background: #18312E;
            padding: 12px;
            border: 2px solid #c89b3c;
            border-radius: 8px;
            margin: 8px auto;
            width: 85%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
            cursor: pointer;
            color: #ffffff;
            transition: all 0.3s ease;
        }

        .method-box:hover {
            background: #c89b3c;
            color: #18312E;
            transform: translateY(-2px);
        }

        .sub-box {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid #c89b3c;
            border-radius: 6px;
            padding: 10px;
            width: 75%;
            margin: 6px auto;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 17px;
            color: #18312E;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .sub-box:hover {
            background: #c89b3c;
            color: #18312E;
            transform: translateX(5px);
        }

        .bank-radio {
            display: none;
        }

        .custom-radio {
            width: 20px;
            height: 20px;
            border: 2px solid #c89b3c;
            border-radius: 50%;
            display: inline-block;
            position: relative;
            transition: all 0.3s ease;
        }

        .bank-radio:checked+.custom-radio {
            background: #c89b3c;
            border-color: #18312E;
        }

        .bank-radio:checked+.custom-radio::after {
            content: "";
            width: 8px;
            height: 8px;
            background: #18312E;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .sub-box.selected {
            background: #c89b3c;
            border-color: #18312E;
            transform: translateX(5px);
        }

        .checkbox-square {
            width: 22px;
            height: 22px;
            border: 2px solid #c89b3c;
            border-radius: 4px;
            background: #18312E;
        }

        .method-box:hover .checkbox-square {
            border-color: #18312E;
            background: #c89b3c;
        }

        .btn-close {
            filter: invert(1);
        }

        .payment-banner {
            width: 160px;
            height: 160px;
            margin: 0 auto 15px;
            border-radius: 50%;
            border: 3px solid #c89b3c;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #18312E;
        }

        .payment-banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .btn-dark {
            background: #18312E;
            border: 2px solid #c89b3c;
            color: #c89b3c;
            font-weight: 600;
        }

        .btn-dark:hover {
            background: #c89b3c;
            color: #18312E;
            border-color: #18312E;
        }

        .confirm-btn {
            background: #c89b3c;
            border: 2px solid #18312E;
            color: #18312E;
            font-weight: 600;
            padding: 12px 30px;
            font-size: 18px;
            border-radius: 8px;
            margin: 20px auto 10px;
            display: block;
            width: 85%;
            transition: all 0.3s ease;
        }

        .confirm-btn:hover {
            background: #18312E;
            color: #c89b3c;
            border-color: #c89b3c;
            transform: translateY(-2px);
        }

        .confirm-btn:disabled {
            background: #5c5c5c;
            border-color: #5c5c5c;
            color: #d9d9d9;
            cursor: not-allowed;
            transform: none;
        }

        .method-box span {
            color: #c89b3c;
            font-weight: bold;
        }

        .method-box:hover span {
            color: #18312E;
        }

        .payment-frame {
            margin: 20px 0;
            border: 1px solid #c89b3c;
            border-radius: 8px;
            overflow: hidden;
        }

        .snap-container {
            min-height: 500px;
        }.payment-actions {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
        }
        
        .load-payment-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #c89b3c, #e6c780, #c89b3c);
            color: #18312E;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.4s;
            letter-spacing: 1px;
            font-family: 'Georgia', serif;
            text-transform: uppercase;
            position: relative;
            overflow: hidden;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .load-payment-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.7s;
            z-index: -1;
        }
        
        .load-payment-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(200, 155, 60, 0.4);
            color: #0a1f1c;
        }
        
        .load-payment-btn:hover::before {
            left: 100%;
        }
        
        .load-payment-btn i {
            font-size: 20px;
        }
        
        .payment-status {
            text-align: center;
            padding: 15px;
            background-color: rgba(10, 31, 28, 0.7);
            border-radius: 8px;
            border-left: 4px solid #c89b3c;
            margin-bottom: 20px;
        }
        
        .payment-status.paid {
            background-color: rgba(46, 204, 113, 0.1);
            border-left-color: #2ecc71;
            color: #2ecc71;
        }
        
        .payment-status.pending {
            background-color: rgba(243, 156, 18, 0.1);
            border-left-color: #f39c12;
            color: #f39c12;
        }
        
        .payment-frame {
            margin: 20px 0;
            border: 1px solid #c89b3c;
            border-radius: 8px;
            overflow: hidden;
            background-color: rgba(10, 31, 28, 0.8);
            padding: 20px;
            text-align: center;
        }
        
        .payment-instructions {
            margin-top: 15px;
            color: #e6c780;
            font-size: 14px;
        }
        
        .load-payment-btn:disabled {
            background: linear-gradient(135deg, #5c5c5c, #7a7a7a, #5c5c5c);
            color: #d9d9d9;
            cursor: not-allowed;
            transform: none;
        }
        
        .load-payment-btn:disabled:hover {
            transform: none;
            box-shadow: none;
        }
        
        .payment-icon {
            font-size: 48px;
            color: #c89b3c;
            margin-bottom: 15px;
        }
    </style>
@endsection

@section('content')
    <div class="preload" data-preload>
        <div class="circle"></div>
        <p class="text">Courvoiser</p>
    </div>

    @include('layout.components.navbar')
    <main class="checkout-container">
        <div class="container">
            <div class="checkout-box">
                <h1 class="page-title">Payment Details</h1>

                <div class="checkout-content">
                    <div class="customer-details">
                        <h2>Personal Information</h2>

                        <div class="detail-group">
                            <div class="detail-label">Name :</div>
                            <div class="detail-value">
                                {{ $order->user->first_name }} {{ $order->user->last_name }}
                            </div>
                        </div>

                        <div class="detail-group">
                            <div class="detail-label">Phone :</div>
                            <div class="detail-value">
                                {{ $order->user->phone ?? $order->reservation->phone }}
                            </div>
                        </div>

                        <div class="detail-group">
                            <div class="detail-label">Email Address :</div>
                            <div class="detail-value">
                                {{ $order->user->email }}
                            </div>
                        </div>

                        <div class="detail-group">
                            <div class="detail-label">Reservation Code :</div>
                            <div class="detail-value">
                                {{ $order->reservation->reservation_code }}
                            </div>
                        </div>

                        {{-- Payment Status Indicator --}}
                        @if($order->payment_status == 'paid')
                            <div class="payment-status paid">
                                <i class="fas fa-check-circle"></i>
                                <p>Downpayment already paid</p>
                            </div>
                        @elseif($order->payment_status == 'pending')
                            <div class="payment-status pending">
                                <i class="fas fa-clock"></i>
                                <p>Payment pending confirmation</p>
                            </div>
                        @endif
                    </div>

                    <div class="divider"></div>
                    <div class="order-section">
                        <h2>Your Order</h2>

                        <div class="order-table">
                            <div class="order-header">
                                <span class="product-col">Product</span>
                                <span class="subtotal-col">Subtotal</span>
                            </div>

                            @foreach ($order->carts as $item)
                                <div class="order-item">
                                    <div class="product-info">
                                        <span class="product-name">{{ $item->menu->name }}</span>
                                        <span class="product-quantity">× {{ $item->quantity }}</span>
                                    </div>
                                    <span class="product-price">IDR
                                        {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                                </div>
                            @endforeach

                            <div class="order-totals">
                                <div class="total-row">
                                    <span>Subtotal</span>
                                    <span>IDR {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                                </div>
                                <div class="total-row">
                                    <span>Down Payment (50%)</span>
                                    <span class="grand-total">IDR
                                        {{ number_format($order->down_payment_amount, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="payment-frame">
                            @if($order->down_payment_paid == 0 || $order->status == 'Pending')
                                <div class="payment-icon">
                                    <i class="fas fa-credit-card"></i>
                                </div>
                                <h3 style="color: #e6c780; margin-bottom: 15px;">Complete Your Payment</h3>
                                <p style="color: #d1ccc3; margin-bottom: 20px;">
                                    Pay your downpayment of <strong>IDR {{ number_format($order->down_payment_amount, 0, ',', '.') }}</strong> to confirm your reservation
                                </p>
                                
                                <div class="payment-actions">
                                    <button id="loadPaymentBtn" class="load-payment-btn">
                                        <i class="fas fa-lock"></i>
                                        Pay Now with Midtrans
                                    </button>
                                </div>
                                
                                <div class="payment-instructions">
                                    <i class="fas fa-shield-alt"></i>
                                    Secure payment powered by Midtrans
                                </div>
                            @elseif($order->payment_status == 'paid')
                                <div class="payment-icon">
                                    <i class="fas fa-check-circle" style="color: #2ecc71;"></i>
                                </div>
                                <h3 style="color: #2ecc71; margin-bottom: 15px;">Payment Completed</h3>
                                <p style="color: #d1ccc3; margin-bottom: 20px;">
                                    Your downpayment of <strong>IDR {{ number_format($order->down_payment_amount, 0, ',', '.') }}</strong> has been received
                                </p>
                                <div class="payment-actions">
                                    <a href="{{ route('reservation.show', $order->reservation_id) }}" class="load-payment-btn" style="background: linear-gradient(135deg, #2ecc71, #27ae60);">
                                        <i class="fas fa-calendar-check"></i>
                                        View Reservation Details
                                    </a>
                                </div>
                            @endif
                        </div>

                        <div class="payment-info">
                            <p class="dp-subtitle">
                                <i class="fas fa-info-circle"></i>
                                Full Payment (IDR {{ number_format($order->remaining_amount, 0, ',', '.') }})
                                will be billed after Dine-In
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loadPaymentBtn = document.getElementById('loadPaymentBtn');
            
            @if ($order->snap_token && ($order->down_payment_paid == 0 || $order->status == 'Pending'))
                loadPaymentBtn.addEventListener('click', function() {
                    const snapToken = '{{ $order->snap_token }}';
                    const button = this;
                    button.disabled = true;
                    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading Payment...';
                    
                    snap.pay(snapToken, {
                        onSuccess: function(result) {
                            console.log('Payment success:', result);
                            window.location.href = '{{ route('checkout.success') }}?order_id=' + result.order_id;
                        },
                        onPending: function(result) {
                            console.log('Payment pending:', result);
                            window.location.href = '{{ route('checkout.pending') }}?order_id=' + result.order_id;
                        },
                        onError: function(result) {
                            console.log('Payment error:', result);
                            button.disabled = false;
                            button.innerHTML = '<i class="fas fa-lock"></i> Pay Now with Midtrans';
                            alert('Payment failed. Please try again.');
                        },
                        onClose: function() {
                            console.log('Payment popup closed');
                            button.disabled = false;
                            button.innerHTML = '<i class="fas fa-lock"></i> Pay Now with Midtrans';
                        }
                    });
                });
            @elseif(!$order->snap_token && ($order->payment_status == 'unpaid' || $order->payment_status == 'pending'))
                if (loadPaymentBtn) {
                    loadPaymentBtn.disabled = true;
                    loadPaymentBtn.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Payment Not Available';
                    loadPaymentBtn.style.background = 'linear-gradient(135deg, #e74c3c, #c0392b)';
                }
            @endif
            
            @if($order->payment_status == 'pending' && $order->snap_token)
            @endif
        });
    </script>
@endsection