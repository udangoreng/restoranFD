@extends('layout.index')
@section('style')
 <link rel="stylesheet" href="{{asset('css/detail_menu.css')}}">   
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
                <h2 class="detail-menu-title">{{$menu->name}}</h2>
                <p class="detail-menu-sub">Neight : {{$menu->calories}} | Category : {{$menu->category}}</p>

                <p class="detail-menu-desc">
                    {{$menu->description}}
                </p>

                <h4 class="detail-menu-price">@currency($menu->price)</h4>
            </div>
            <button class="add-to-cart-btn" data-name="Grilled Caesar Salad" data-price="175000"
                data-image="appetizer1.jpg">
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

    <div class="floating-cart" id="floatingCartBtn">
        <i class="fa-solid fa-cart-shopping"></i>
        <span class="cart-count" id="cartCount">0</span>
    </div>
@endsection

@section('script')
    <script src="detail_menu.js"></script>
@endsection
