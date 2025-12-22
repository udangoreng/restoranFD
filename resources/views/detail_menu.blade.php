@extends('layout.index')
@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/detail_menu.css') }}">
    <style>
        .btn-dark {
            background: #18312E;
            border: 2px solid #c89b3c;
            color: #c89b3c;
            font-weight: 600;
            padding: 10px 20px;
        }

        .btn-dark:hover {
            background: #c89b3c;
            color: #18312E;
            border-color: #18312E;
        }

        .modal-content {
            background: linear-gradient(135deg, #18312E 0%, #2a4d48 100%);
            border-radius: 10px;
            border: 2px solid #c89b3c;
        }

        .order-header {
            text-align: center;
            font-size: 20px;
            font-weight: 600;
            color: #c89b3c;
            width: 100%;
        }

        .divider {
            width: 90%;
            height: 2px;
            background: linear-gradient(90deg, transparent 0%, #c89b3c 50%, transparent 100%);
            margin: 10px auto 20px;
        }

        .btn-close {
            filter: invert(1);
        }

        .order-item {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid #c89b3c;
            border-radius: 8px;
            padding: 15px;
            margin: 10px auto;
            width: 90%;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .item-image {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            border: 2px solid #c89b3c;
            overflow: hidden;
            background: #18312E;
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .item-details {
            flex: 1;
        }

        .item-name {
            font-weight: 600;
            color: #18312E;
            margin-bottom: 5px;
        }

        .item-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .quantity-btn {
            width: 25px;
            height: 25px;
            border: 1px solid #c89b3c;
            background: #18312E;
            color: #c89b3c;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-weight: bold;
        }

        .quantity {
            color: #18312E;
            font-weight: 600;
            min-width: 20px;
            text-align: center;
        }

        .item-price {
            color: #18312E;
            font-weight: 600;
        }

        .trash-btn {
            background: #c89b3c;
            border: 1px solid #18312E;
            color: #18312E;
            padding: 8px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        .summary-section {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid #c89b3c;
            border-radius: 8px;
            padding: 15px;
            margin: 15px auto;
            width: 90%;
        }

        .subtotal {
            display: flex;
            justify-content: space-between;
            font-weight: 600;
            font-size: 16px;
            color: #18312E;
        }

        .checkout-btn {
            background: #c89b3c;
            border: 2px solid #18312E;
            color: #18312E;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 8px;
            width: 100%;
            transition: 0.3s ease;
            margin-top: 10px;
        }

        .checkout-btn:hover {
            background: #18312E;
            color: #c89b3c;
            border-color: #c89b3c;
            transform: translateY(-2px);
        }

        @media (max-width: 992px) {
        .detail-menu-box {
            max-width: 100%;
            padding: 30px !important;
            border-radius: 30px;
        }

        .detail-menu-image-circle {
            width: 360px;
            height: 360px;
        }

        .detail-menu-desc {
            font-size: 20px;
        }
    }

    /* ================= MOBILE ================= */
    @media (max-width: 768px) {
        .detail-menu-box {
            padding: 16px !important;
            border-radius: 24px;
        }

        .detail-menu-image-circle {
            width: 220px;
            height: 220px;
        }

        .detail-menu-title {
            font-size: 24px;
            text-align: center;
        }

        .detail-menu-sub,
        .detail-menu-desc,
        .detail-menu-price {
            text-align: center;
        }

        .detail-menu-desc {
            font-size: 16px;
        }

        .add-to-cart-btn {
            width: 100%;
            margin-top: 20px;
        }
    }

    /* ================= SMALL MOBILE ================= */
    @media (max-width: 480px) {
        .othermenu-name {
            font-size: 14px;
        }

        .othermenu-price {
            font-size: 13px;
        }

        .floating-cart {
            bottom: 16px;
            right: 16px;
            width: 54px;
            height: 54px;
            font-size: 18px;
        }

        .cart-count {
            font-size: 12px;
        }

        .order-item {
            flex-direction: column;
            align-items: flex-start;
        }

        .checkout-btn {
            font-size: 16px;
            padding: 12px;
        }
    }
</style>
    </style>
@endsection
@section('content')
    <div class="preload" data-preload>
        <div class="circle"></div>
        <p class="text">Courvoiser</p>
    </div>

    @include('layout.components.navbar')
    <section class="container my-4 detail-menu-section">
        <div class="row align-items-start detail-menu-box p-4">

            <div class="col-md-4 d-flex justify-content-center">
                <div class="detail-menu-image-circle">
                    <img src="{{ asset('storage/' . $menu->img_path) }}" alt="Gambar Menu" class="detail-menu-image">
                </div>
            </div>

            <div class="col-md-8 mt-4 mt-md-0 detail-menu-text">
                <h2 class="detail-menu-title">{{ $menu->name }}</h2>
                <p class="detail-menu-sub">Neight : {{ $menu->calories }} | Category : {{ $menu->category }}</p>

                <p class="detail-menu-desc">
                    {{ $menu->description }}
                </p>

                <h4 class="detail-menu-price">@currency($menu->price)</h4>
            </div>
            <button class="add-to-cart-btn" data-menu-id="{{ $menu->id }}" data-name="{{ $menu->name }}"
                data-price="{{ $menu->price }}" data-image="{{ asset('storage/' . $menu->img_path) }}">
                Add to Order
            </button>
        </div>
    </section>

    <section class="othermenu-section container my-5">
        <p class="othermenu-subtitle text-center">✦ Other Menu ✦</p>
        <h2 class="othermenu-title text-center mb-4">Happy Fine Dining</h2>

        <div class="othermenu-category mb-4">
            <div class="row g-3">
                <div class="col-6 col-md-3">
                    <div class="othermenu-item" style="background-image: url('appetizer1.jpg');"></div>
                    <a href="detail-appetizer1.html" class="othermenu-info">
                        <h5 class="othermenu-name">Grilled Pear & Cheese</h5>
                        <p class="othermenu-price">IDR 135.000</p>
                    </a>
                </div>

                <div class="col-6 col-md-3">
                    <div class="othermenu-item" style="background-image: url('appetizer2.jpg');"></div>
                    <a href="detail-appetizer2.html" class="othermenu-info">
                        <h5 class="othermenu-name">Shrimp Tartlet</h5>
                        <p class="othermenu-price">IDR 150.000</p>
                    </a>
                </div>

                <div class="col-6 col-md-3">
                    <div class="othermenu-item" style="background-image: url('appetizer3.jpg');"></div>
                    <a href="detail-appetizer3.html" class="othermenu-info">
                        <h5 class="othermenu-name">Peach Bruschetta</h5>
                        <p class="othermenu-price">IDR 140.000</p>
                    </a>
                </div>

                <div class="col-6 col-md-3">
                    <div class="othermenu-item" style="background-image: url('appetizer4.jpg');"></div>
                    <a href="detail-appetizer4.html" class="othermenu-info">
                        <h5 class="othermenu-name">Antipasto Bites</h5>
                        <p class="othermenu-price">IDR 160.000</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    @include('layout.components.footer')

    <div class="floating-cart" id="floatingCartBtn" style="visibility: hidden;" data-bs-toggle="modal" data-bs-target="#orderModal">
        <i class="fa-solid fa-cart-shopping"></i>
        <span class="cart-count" id="cartCount">0</span>
    </div>

    @include('order')
@endsection

@section('script')
    @parent
    <script src="{{ asset('js/cart.js') }}"></script>
    <script src="{{ asset('js/detail_menu.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
