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

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="preload" as="image" href="slider-1.jpg">
    <link rel="preload" as="image" href="slider-2.jpg">
    <link rel="preload" as="image" href="slider-3.jpg">
</head>

<body>
    <div class="preload" data-preload>
        <div class="circle"></div>
        <p class="text">Courvoiser</p>
    </div>

    <section id="header">
        <a href="#"><img src="{{asset('img/logo.png')}}" class="logo" alt=""></a>

        <div>
            <ul id="navbar">
                <li><a href="{{route('/')}}">home</a></li>
                <li><a class="active" href="menu.html">menu</a></li>
                <li><a href="about us.html">about</a></li>
                <li><a href="contact.html">contact</a></li>
            </ul>
        </div>

        <a href="{{route('reservasi')}}" class="book-btn">BOOK A TABLE</a>

        <div id="mobile">
            <i id="bar" class="fa-solid fa-bars"></i>
        </div>
    </section>

    <section class="menu-section container my-5">
        <p class="menu-subtitle text-center">✦ Menu's ✦</p>
        <h2 class="menu-title text-center mb-4">Happy Fine Dine In</h2>

        <div class="menu-category mb-4">
            <h4 class="menu-heading">Appetizer</h4>
            <div class="row g-3">
                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('/img/appetizer1.jpg');"></div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('/img/appetizer2.jpg');"></div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('/img/appetizer3.jpg');"></div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('/img/appetizer4.jpg');"></div>
                </div>
            </div>
        </div>

        <div class="menu-category mb-4">
            <h4 class="menu-heading">Main Dish</h4>
            <div class="row g-3">
                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('/img/maindish1.jpg');"></div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('/img/maindish2.jpg');"></div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('/img/maindish3.jpg');"></div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('/img/maindish4.jpg');"></div>
                </div>
            </div>
        </div>

        <div class="menu-category mb-4">
            <h4 class="menu-heading">Dessert</h4>
            <div class="row g-3">
                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('/img/dessert1.jpg');"></div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('/img/dessert2.jpg');"></div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('/img/dessert3.jpg');"></div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('/img/dessert4.jpg');"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="best-seller-section container my-5">
        <div class="row align-items-start">

            <div class="col-md-6">
                <div class="best-seller-img" style="background-image: url('/img/best1.jpeg');"></div>
            </div>

            <div class="col-md-6">
                <h3 class="best-seller-title">✦ BEST SELLER ✦</h3>

                <h4 class="best-seller-name">Lobster Tortellini</h4>
                <p class="best-seller-desc">Lorem Ipsum</p>

                <p class="best-seller-price">2.000.000,00 k</p>
            </div>

        </div>
    </section>

    <section class="additional-section container my-5">
        <h2 class="additional-title text-center mb-5">✦ Additional ✦</h2>

        <div class="row g-5">

            <div class="col-md-6 d-flex additional-item">
                <div class="additional-img hover-img" style="background-image: url('/img/addon1.jpg');"></div>
                <div class="additional-text ms-3">
                    <h4 class="additional-name clickable">Caviar
                        <span class="additional-price">1.000.000,00 k</span>
                    </h4>
                    <p class="additional-desc">Lorem Ipsum</p>
                </div>
            </div>

            <div class="col-md-6 d-flex additional-item">
                <div class="additional-img hover-img" style="background-image: url('/img/addon2.jpg');"></div>
                <div class="additional-text ms-3">
                    <h4 class="additional-name clickable">Caviar
                        <span class="additional-price">1.000.000,00 k</span>
                    </h4>
                    <p class="additional-desc">Lorem Ipsum</p>
                </div>
            </div>

            <div class="col-md-6 d-flex additional-item">
                <div class="additional-img hover-img" style="background-image: url('/img/addon1.jpg');"></div>
                <div class="additional-text ms-3">
                    <h4 class="additional-name clickable">Caviar
                        <span class="additional-price">1.000.000,00 k</span>
                    </h4>
                    <p class="additional-desc">Lorem Ipsum</p>
                </div>
            </div>

            <div class="col-md-6 d-flex additional-item">
                <div class="additional-img hover-img" style="background-image: url('/img/addon2.jpg');"></div>
                <div class="additional-text ms-3">
                    <h4 class="additional-name clickable">Caviar
                        <span class="additional-price">1.000.000,00 k</span>
                    </h4>
                    <p class="additional-desc">Lorem Ipsum</p>
                </div>
            </div>

            <div class="col-md-6 d-flex additional-item">
                <div class="additional-img hover-img" style="background-image: url('/img/addon1.jpg');"></div>
                <div class="additional-text ms-3">
                    <h4 class="additional-name clickable">Caviar
                        <span class="additional-price">1.000.000,00 k</span>
                    </h4>
                    <p class="additional-desc">Lorem Ipsum</p>
                </div>
            </div>

            <div class="col-md-6 d-flex additional-item">
                <div class="additional-img hover-img" style="background-image: url('/img/addon2.jpg');"></div>
                <div class="additional-text ms-3">
                    <h4 class="additional-name clickable">Caviar
                        <span class="additional-price">1.000.000,00 k</span>
                    </h4>
                    <p class="additional-desc">Lorem Ipsum</p>
                </div>
            </div>
        </div>
    </section>

    <section class="footer">

        <div class="footer-content">

            <div class="footer-img-container">
                <img src="{{asset('img/footer1.jpg')}}" alt="Restaurant Interior" class="footer-side-img">
            </div>

            <div class="footer-center">

                <img src="{{asset('img/logo1.png')}}" alt="Restoria Logo" class="footer-logo-img">

                <p class="visit-us">✦ VISIT US ✦</p>

                <p>Restoria, Arrondissement, Paris 9578</p>
                <p>Daily · 8.00 am to 10.00 pm</p>
                <p>booking@gmail.com</p>
                <p>Booking Request : +88-123-123456</p>

                <hr class="footer-divider">

                <h3 class="newsletter-title">Our Newsletter</h3>
                <p class="newsletter-sub">Subscribe us & Get 25% Off. Get latest updates.</p>

                <div class="newsletter-form">
                    <input type="email" placeholder="Your email">
                    <button>SUBSCRIBE</button>
                </div>
            </div>

            <div class="footer-img-container">
                <img src="{{asset('img/footer2.jpg')}}" alt="Desserts img" class="footer-side-img">
            </div>

        </div>

        <div class="footer-bottom">
            <p>© 2025 All Rights Reserved</p>

            <div class="socials">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>

        </div>

    </section>

    <script src="{{asset('js/script.js')}}"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>