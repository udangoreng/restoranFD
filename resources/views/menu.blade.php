@extends('layout.index')
@section('content')
    <div class="preload" data-preload>
        <div class="circle"></div>
        <p class="text">Courvoiser</p>
    </div>

    @include('layout.components.navbar')

    <section id="hero">
        <h1 class="serif">A JOURNEY<br>OF REFINED</h1>
        <h2 class="script">flavors</h2>

        <div class="banner">
            <video autoplay loop muted plays-inline>
                <source src="{{ asset('video/video2.mp4') }}" type="video/mp4">
            </video>
        </div>
    </section>

    <section class="menu-section container my-5">
        <p class="menu-subtitle text-center">✦ Menu's ✦</p>
        <h2 class="menu-title text-center mb-4">Happy Fine Dining</h2>

        <div class="menu-category mb-4">
            <h4 class="menu-heading">Appetizer</h4>
            <div class="row g-3">
                @foreach ($appetizers as $appetizer)
                    <div class="col-6 col-md-3">
                        <div class="menu-item"
                            style="background-image: url({{ asset($appetizer->img_path) }});"></div>
                        <a href="{{ isset($reservation) ? route('order.menu.detail', [$reservation->id, $appetizer->id]) : route('menu.detail', $appetizer->id) }}"
                            class="menu-info">
                            <h5 class="menu-name">{{ $appetizer->name }}</h5>
                            <p class="menu-price">@currency($appetizer->price)</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="menu-item"
                            style="background-image: url({{ asset($appetizer->img_path) }});"></div>
                        <a href="{{ isset($reservation) ? route('order.menu.detail', [$reservation->id, $appetizer->id]) : route('menu.detail', $appetizer->id) }}"
                            class="menu-info">
                            <h5 class="menu-name">{{ $appetizer->name }}</h5>
                            <p class="menu-price">@currency($appetizer->price)</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="menu-item"
                            style="background-image: url({{ asset($appetizer->img_path) }});"></div>
                        <a href="{{ isset($reservation) ? route('order.menu.detail', [$reservation->id, $appetizer->id]) : route('menu.detail', $appetizer->id) }}"
                            class="menu-info">
                            <h5 class="menu-name">{{ $appetizer->name }}</h5>
                            <p class="menu-price">@currency($appetizer->price)</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="menu-item"
                            style="background-image: url({{ asset($appetizer->img_path) }});"></div>
                        <a href="{{ isset($reservation) ? route('order.menu.detail', [$reservation->id, $appetizer->id]) : route('menu.detail', $appetizer->id) }}"
                            class="menu-info">
                            <h5 class="menu-name">{{ $appetizer->name }}</h5>
                            <p class="menu-price">@currency($appetizer->price)</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="menu-category mb-4">
            <h4 class="menu-heading">Main Dish</h4>
            <div class="row g-3">
                @foreach ($mainDishes as $mainDish)
                    <div class="col-6 col-md-3">
                        <div class="menu-item"
                            style="background-image: url({{ asset($mainDish->img_path) }});"></div>
                        <a href="{{ isset($reservation) ? route('order.menu.detail', [$reservation->id, $mainDish->id]) : route('menu.detail', $mainDish->id) }}"
                            class="menu-info">
                            <h5 class="menu-name">{{ $mainDish->name }}</h5>
                            <p class="menu-price">@currency($mainDish->price)</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="menu-item"
                            style="background-image: url({{ asset($mainDish->img_path) }});"></div>
                        <a href="{{ isset($reservation) ? route('order.menu.detail', [$reservation->id, $mainDish->id]) : route('menu.detail', $mainDish->id) }}"
                            class="menu-info">
                            <h5 class="menu-name">{{ $mainDish->name }}</h5>
                            <p class="menu-price">@currency($mainDish->price)</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="menu-item"
                            style="background-image: url({{ asset($mainDish->img_path) }});"></div>
                        <a href="{{ isset($reservation) ? route('order.menu.detail', [$reservation->id, $mainDish->id]) : route('menu.detail', $mainDish->id) }}"
                            class="menu-info">
                            <h5 class="menu-name">{{ $mainDish->name }}</h5>
                            <p class="menu-price">@currency($mainDish->price)</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="menu-item"
                            style="background-image: url({{ asset($mainDish->img_path) }});"></div>
                        <a href="{{ isset($reservation) ? route('order.menu.detail', [$reservation->id, $mainDish->id]) : route('menu.detail', $mainDish->id) }}"
                            class="menu-info">
                            <h5 class="menu-name">{{ $mainDish->name }}</h5>
                            <p class="menu-price">@currency($mainDish->price)</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="menu-category mb-4">
            <h4 class="menu-heading">Dessert</h4>
            <div class="row g-3">
                @foreach ($desserts as $dessert)
                    <div class="col-6 col-md-3">
                        <div class="menu-item"
                            style="background-image: url({{ asset($dessert->img_path) }});">
                        </div>
                        <a href="{{ isset($reservation) ? route('order.menu.detail', [$reservation->id, $dessert->id]) : route('menu.detail', $dessert->id) }}"
                            class="menu-info">
                            <h5 class="menu-name">{{ $dessert->name }}</h5>
                            <p class="menu-price">@currency($dessert->price)</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="menu-item"
                            style="background-image: url({{ asset($dessert->img_path) }});">
                        </div>
                        <a href="{{ isset($reservation) ? route('order.menu.detail', [$reservation->id, $dessert->id]) : route('menu.detail', $dessert->id) }}"
                            class="menu-info">
                            <h5 class="menu-name">{{ $dessert->name }}</h5>
                            <p class="menu-price">@currency($dessert->price)</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="menu-item"
                            style="background-image: url({{ asset($dessert->img_path) }});">
                        </div>
                        <a href="{{ isset($reservation) ? route('order.menu.detail', [$reservation->id, $dessert->id]) : route('menu.detail', $dessert->id) }}"
                            class="menu-info">
                            <h5 class="menu-name">{{ $dessert->name }}</h5>
                            <p class="menu-price">@currency($dessert->price)</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="menu-item"
                            style="background-image: url({{ asset($dessert->img_path) }});">
                        </div>
                        <a href="{{ isset($reservation) ? route('order.menu.detail', [$reservation->id, $dessert->id]) : route('menu.detail', $dessert->id) }}"
                            class="menu-info">
                            <h5 class="menu-name">{{ $dessert->name }}</h5>
                            <p class="menu-price">@currency($dessert->price)</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="best-seller-section container my-5">
        <div class="row align-items-start">

            <div class="col-md-6">
                <div class="best-seller-img" style="background-image: url({{ asset('img/best1.jpeg') }});"></div>
            </div>

            <div class="col-md-6">
                <a href="detail-bestseller.html" class="best-seller-link">
                    <h3 class="best-seller-title">✦ BEST SELLER ✦</h3>

                    <h4 class="best-seller-name">Lobster Tortellini</h4>
                    <p class="best-seller-desc">Handcrafted tortellini filled with sweet lobster, served in a rich butter
                        cream sauce with delicate herbs for an elegant, refined finish.</p>

                    <p class="best-seller-price">IDR 289.000</p>
                </a>
            </div>

        </div>
    </section>

    <section class="drink-section">
        <p class="drink-subtitle text-center">✦ Drink's Menu ✦</p>
        <h2 class="drink-main-title text-center">Luxury Beverages Selection</h2>

        <div class="drink-container">

            <div class="drink-list">
                @foreach ($beverages as $beverage)
                    <div class="drink-item">
                        <img src="{{ asset('img/matcha.jpg') }}" class="drink-thumb">
                        <div class="drink-text">
                            <div class="drink-title-row">
                                <a
                                    href="{{ isset($reservation) ? route('order.menu.detail', [$reservation->id, $beverage->id]) : route('menu.detail', $beverage->id) }}">
                                    <span>{{ $beverage->name }}</span>
                                    <span class="drink-price">@currency($beverage->price)</span>
                                </a>
                            </div>
                            <p>{{ $beverage->description }}</p>
                        </div>
                    </div>
                    <div class="drink-item">
                        <img src="{{ asset('img/matcha.jpg') }}" class="drink-thumb">
                        <div class="drink-text">
                            <div class="drink-title-row">
                                <a
                                    href="{{ isset($reservation) ? route('order.menu.detail', [$reservation->id, $beverage->id]) : route('menu.detail', $beverage->id) }}">
                                    <span>{{ $beverage->name }}</span>
                                    <span class="drink-price">@currency($beverage->price)</span>
                                </a>
                            </div>
                            <p>{{ $beverage->description }}</p>
                        </div>
                    </div>
                    <div class="drink-item">
                        <img src="{{ asset('img/matcha.jpg') }}" class="drink-thumb">
                        <div class="drink-text">
                            <div class="drink-title-row">
                                <a
                                    href="{{ isset($reservation) ? route('order.menu.detail', [$reservation->id, $beverage->id]) : route('menu.detail', $beverage->id) }}">
                                    <span>{{ $beverage->name }}</span>
                                    <span class="drink-price">@currency($beverage->price)</span>
                                </a>
                            </div>
                            <p>{{ $beverage->description }}</p>
                        </div>
                    </div>
                    <div class="drink-item">
                        <img src="{{ asset('img/matcha.jpg') }}" class="drink-thumb">
                        <div class="drink-text">
                            <div class="drink-title-row">
                                <a
                                    href="{{ isset($reservation) ? route('order.menu.detail', [$reservation->id, $beverage->id]) : route('menu.detail', $beverage->id) }}">
                                    <span>{{ $beverage->name }}</span>
                                    <span class="drink-price">@currency($beverage->price)</span>
                                </a>
                            </div>
                            <p>{{ $beverage->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="drink-image">
                <img src="{{ asset('img/mocktail.jpg') }}" alt="">
            </div>

        </div>
    </section>

    <section class="additional-section container my-5">
        <h2 class="additional-title text-center mb-5">✦ Additional ✦</h2>

        <div class="row g-5">

            @foreach ($additionals as $additional)
                <div class="col-md-6 d-flex additional-item">
                    <div class="additional-img hover-img"
                        style="background-image: url({{ asset($additional->img_path) }});">
                    </div>
                    <a
                        href="{{ isset($reservation) ? route('order.menu.detail', [$reservation->id, $appetizer->id]) : route('menu.detail', $appetizer->id) }}">
                        <div class="additional-text ms-3">
                            <h4 class="additional-name clickable">{{ $additional->name }}
                                <span class="additional-price">@currency($additional->price)</span>
                            </h4>
                            <p class="additional-desc">{{ $additional->description }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 d-flex additional-item">
                    <div class="additional-img hover-img"
                        style="background-image: url({{ asset($additional->img_path) }});">
                    </div>
                    <a
                        href="{{ isset($reservation) ? route('order.menu.detail', [$reservation->id, $appetizer->id]) : route('menu.detail', $appetizer->id) }}">
                        <div class="additional-text ms-3">
                            <h4 class="additional-name clickable">{{ $additional->name }}
                                <span class="additional-price">@currency($additional->price)</span>
                            </h4>
                            <p class="additional-desc">{{ $additional->description }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 d-flex additional-item">
                    <div class="additional-img hover-img"
                        style="background-image: url({{ asset($additional->img_path) }});">
                    </div>
                    <a
                        href="{{ isset($reservation) ? route('order.menu.detail', [$reservation->id, $appetizer->id]) : route('menu.detail', $appetizer->id) }}">
                        <div class="additional-text ms-3">
                            <h4 class="additional-name clickable">{{ $additional->name }}
                                <span class="additional-price">@currency($additional->price)</span>
                            </h4>
                            <p class="additional-desc">{{ $additional->description }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 d-flex additional-item">
                    <div class="additional-img hover-img"
                        style="background-image: url({{ asset($additional->img_path) }});">
                    </div>
                    <a
                        href="{{ isset($reservation) ? route('order.menu.detail', [$reservation->id, $appetizer->id]) : route('menu.detail', $appetizer->id) }}">
                        <div class="additional-text ms-3">
                            <h4 class="additional-name clickable">{{ $additional->name }}
                                <span class="additional-price">@currency($additional->price)</span>
                            </h4>
                            <p class="additional-desc">{{ $additional->description }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    @include('layout.components.footer')
@endsection
