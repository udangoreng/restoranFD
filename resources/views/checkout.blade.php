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
                <h1 class="page-title">Detail Pembayaran</h1>
                
                <div class="checkout-content">
                    <div class="customer-details">
                        <h2>Informasi Pelanggan</h2>
                        
                        <div class="detail-group">
                            <div class="detail-label">Nama :</div>
                            <div class="detail-value" id="customer-name">Cholby Sabrina</div>
                        </div>
                        
                        <div class="detail-group">
                            <div class="detail-label">Alamat :</div>
                            <div class="detail-value" id="customer-address">
                                Jl. Ketintang A No. 19,<br>
                                Surabaya, Jawa Timur 
                            </div>
                        </div>
                        
                        <div class="detail-group">
                            <div class="detail-label">No.Tlp :</div>
                            <div class="detail-value" id="customer-phone">0812-3456-7890</div>
                        </div>
                        
                        <div class="detail-group">
                            <div class="detail-label">Email Address :</div>
                            <div class="detail-value" id="customer-email">cholbysabrina@email.com</div>
                        </div>
                    </div>
                    
                    <div class="divider"></div>
                    <div class="order-section">
                        <h2>Your Order</h2>
                        
                        <div class="order-table">
                            <div class="order-header">
                                <span class="product-col">Product</span>
                                <span class="subtotal-col">Subtotal</span>
                            </div>
                            
                            <div class="order-item">
                                <div class="product-info">
                                    <span class="product-name">Peach Bruschetta</span>
                                    <span class="product-quantity">× 1</span>
                                </div>
                                <span class="product-price">IDR 140.000</span>
                            </div>
                            
                            <div class="order-item">
                                <div class="product-info">
                                    <span class="product-name">Herb Roasted Salmon</span>
                                    <span class="product-quantity">× 1</span>
                                </div>
                                <span class="product-price">IDR 185.000</span>
                            </div>
                            
                            <div class="order-item">
                                <div class="product-info">
                                    <span class="product-name">Garlic Butter Lobster</span>
                                    <span class="product-quantity">× 1</span>
                                </div>
                                <span class="product-price">IDR 320.000</span>
                            </div>

                            <div class="order-item">
                                <div class="product-info">
                                    <span class="product-name">Caramel Pannacotta</span>
                                    <span class="product-quantity">× 1</span>
                                </div>
                                <span class="product-price">IDR 105.000</span>
                            </div>

                            <div class="order-item">
                                <div class="product-info">
                                    <span class="product-name">Lychee Rose Mocktail</span>
                                    <span class="product-quantity">× 2</span>
                                </div>
                                <span class="product-price">IDR 73.000</span>
                            </div>
                            
                            <div class="order-item">
                                <div class="product-info">
                                    <span class="product-name">Strawberry Smoothie</span>
                                    <span class="product-quantity">× 1</span>
                                </div>
                                <span class="product-price">IDR 55.000</span>
                            </div>

                            <div class="order-totals">
                                <div class="total-row">
                                    <span>Subtotal</span>
                                    <span>IDR 951.000</span>
                                </div>
                                <div class="total-row">
                                    <span>Total</span>
                                    <span class="grand-total">IDR 1.046.100</span>
                                </div>
                            </div>
                        </div>
                        <div class="payment-method">
                            <h3>Metode Pembayaran</h3>
                            <div class="payment-info">
                                <span class="payment-text">Metode yang dipilih:</span>
                                <button class="change-payment-btn">Change Method</button>
                            </div>
                        </div>
                        
                        <button type="submit" class="place-order-btn">
                            Place Order
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection