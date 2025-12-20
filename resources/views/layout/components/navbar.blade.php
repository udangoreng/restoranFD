<section id="header" style="visibility: hidden;">
    <a href="#"><img src="{{ asset('img/logo.png') }}" class="logo" alt=""></a>

    <div>
        <ul id="navbar">
            <li><a class="{{ request()->route()->getName() === '/' ? 'active' : '' }}" href="{{ route('/') }}">home</a></li>
            <li><a class="{{ request()->route()->getName() === 'menu' ? 'active' : '' }}" href="{{ route('menu') }}">menu</a></li>
            <li><a class="{{ request()->route()->getName() === 'aboutus' ? 'active' : '' }}" href="{{ route('aboutus') }}">about</a></li>
            <li><a class="{{ request()->route()->getName() === 'contact' ? 'active' : '' }}" href="{{ route('contact') }}">contact</a></li>
        </ul>
    </div>

    <a href="{{ route('reservation') }}" class="book-btn">BOOK A TABLE</a>

    <div id="mobile">
        <i id="bar" class="fa-solid fa-bars"></i>
    </div>

    <div id="mobile-menu" class="mobile-menu" data-navbar>
        <div class="mobile-menu-logo">
            <img src="{{ asset('img/logo1.png') }}" alt="Logo">
        </div>

        <ul class="mobile-nav-list">
            @auth
                <li>
                    <a href="{{route('profile')}}" class="mobile-link">
                        <span class="star">✦</span>
                        My Profile
                        <span class="arrow">›</span>
                    </a>
                </li>

                <li>
                    <a href="my_reservation.html" class="mobile-link">
                        <span class="star">✦</span>
                        My Reservation
                        <span class="arrow">›</span>
                    </a>
                </li>

                <li>
                    <a href="my_history.html" class="mobile-link">
                        <span class="star">✦</span>
                        My History
                        <span class="arrow">›</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('logout')}}" class="mobile-link">
                        <span class="star">✦</span>
                        Logout
                        <span class="arrow">›</span>
                    </a>
                </li>
            @endauth

            @guest
                <li>
                    <a href="{{ route('login') }}" class="mobile-link">
                        <span class="star">✦</span>
                        Log In
                        <span class="arrow">›</span>
                    </a>
                </li>
            @endguest
        </ul>
    </div>
    <div id="overlay"></div>

</section>
