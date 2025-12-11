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
        <a href="#"><img src="logo.png" class="logo" alt=""></a>

        <div>
            <ul id="navbar">
                <li><a href="home.html">home</a></li>
                <li><a class="active" href="menu.html">menu</a></li>
                <li><a href="about.html">about</a></li>
                <li><a href="contact.html">contact</a></li>
            </ul>
        </div>

        <a href="reservation.html" class="book-btn">BOOK A TABLE</a>

        <div id="mobile">
            <i id="bar" class="fa-solid fa-bars"></i>
        </div>

        <div id="mobile-menu" class="mobile-menu" data-navbar>
            <div class="mobile-menu-logo">
                <img src="logo1.png" alt="Logo">
            </div>

            <ul class="mobile-nav-list">
                <li>
                    <a href="profile.html" class="mobile-link">
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
                    <a href="login.html" class="mobile-link">
                        <span class="star">✦</span>
                        Log In
                        <span class="arrow">›</span>
                    </a>
                </li>
            </ul>
        </div>
        <div id="overlay"></div>
    </section>

    <section id="hero">
         <h1 class="serif">A JOURNEY<br>OF REFINED</h1>
        <h2 class="script">flavors</h2>

        <div class="banner">
            <video autoplay loop muted plays-inline>
                <source src="video2.mp4" type="video/mp4">
            </video>
        </div>
    </section>

    <section class="menu-section container my-5">
        <p class="menu-subtitle text-center">✦ Menu's ✦</p> 
        <h2 class="menu-title text-center mb-4">Happy Fine Dining</h2> 

        <div class="menu-category mb-4">
            <h4 class="menu-heading">Appetizer</h4>
            <div class="row g-3">
                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('appetizer1.jpg');"></div>
                    <a href="detail_menu.html" class="menu-info">
                        <h5 class="menu-name">Grilled Pear & Cheese</h5>
                        <p class="menu-price">IDR 135.000</p>
                    </a>
                </div>

                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('appetizer2.jpg');"></div>
                     <a href="detail-appetizer2.html" class="menu-info">
                        <h5 class="menu-name">Shrimp Tartlet</h5>
                        <p class="menu-price">IDR 150.000</p>
                    </a>
                </div>

                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('appetizer3.jpg');"></div>
                    <a href="detail-appetizer3.html" class="menu-info">
                        <h5 class="menu-name">Peach Bruschetta</h5>
                        <p class="menu-price">IDR 140.000</p>
                    </a>
                </div>

                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('appetizer4.jpg');"></div>
                    <a href="detail-appetizer4.html" class="menu-info">
                        <h5 class="menu-name">Antipasto Bites</h5>
                        <p class="menu-price">IDR 160.000</p>
                    </a>
                </div>
            </div>
        </div>

        <div class="menu-category mb-4">
            <h4 class="menu-heading">Main Dish</h4>
            <div class="row g-3">
                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('maindish1.jpg');"></div>
                    <a href="detail-maindish1.html" class="menu-info">
                        <h5 class="menu-name">Herb-Roasted Salmon</h5>
                        <p class="menu-price">IDR 185.000</p>
                    </a>
                </div>

                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('maindish2.jpg');"></div>
                    <a href="detail-maindish2.html" class="menu-info">
                        <h5 class="menu-name">Golden Roast Chicken</h5>
                        <p class="menu-price">IDR 210.000</p>
                    </a>
                </div>

                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('maindish3.jpg');"></div>
                    <a href="detail-maindish3.html" class="menu-info">
                        <h5 class="menu-name">Premium Lamb Chops</h5>
                        <p class="menu-price">IDR 260.000</p>
                    </a>
                </div>

                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('maindish4.jpg');"></div>
                    <a href="detail-maindish4.html" class="menu-info">
                        <h5 class="menu-name">Garlic Butter Lobster</h5>
                        <p class="menu-price">IDR 320.000</p>
                    </a>
                </div>
            </div>
        </div>

        <div class="menu-category mb-4">
            <h4 class="menu-heading">Dessert</h4>
            <div class="row g-3">
                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('dessert1.jpg');"></div>
                    <a href="detail-dessert1.html" class="menu-info">
                        <h5 class="menu-name">Caramel Banana Cake</h5>
                        <p class="menu-price">IDR 95.000</p>
                    </a>
                </div>

                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('dessert2.jpg');"></div>
                    <a href="detail-dessert2.html" class="menu-info">
                        <h5 class="menu-name">Fresh Fruit Shortcake</h5>
                        <p class="menu-price">IDR 110.000</p>
                    </a>
                </div>

                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('dessert3.jpg');"></div>
                    <a href="detail-dessert3.html" class="menu-info">
                        <h5 class="menu-name">Classic Cherry Cheesecake</h5>
                        <p class="menu-price">IDR 120.000</p>
                    </a>
                </div>

                <div class="col-6 col-md-3">
                    <div class="menu-item" style="background-image: url('dessert4.jpg');"></div>
                    <a href="detail-dessert4.html" class="menu-info">
                        <h5 class="menu-name">Caramel Panna Cotta</h5>
                        <p class="menu-price">IDR 105.000</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="best-seller-section container my-5">
        <div class="row align-items-start">
            
            <div class="col-md-6">
                <div class="best-seller-img" style="background-image: url('best1.jpeg');"></div>
            </div>

            <div class="col-md-6">
                <a href="detail-bestseller.html" class="best-seller-link">
                    <h3 class="best-seller-title">✦ BEST SELLER ✦</h3>

                    <h4 class="best-seller-name">Lobster Tortellini</h4>
                    <p class="best-seller-desc">Handcrafted tortellini filled with sweet lobster, served in a rich butter cream sauce with delicate herbs for an elegant, refined finish.</p>

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

        <div class="drink-item">
            <img src="matcha.jpg" class="drink-thumb">
            <div class="drink-text">
            <div class="drink-title-row">
                <span>ICED MATCHA LATTE</span>
                <span class="drink-price">IDR 49.000</span>
            </div>
            <p>Matcha powder blended with fresh milk and light sweetness.</p>
            </div>
        </div>

        <div class="drink-item">
            <img src="berry.jpg" class="drink-thumb">
            <div class="drink-text">
            <div class="drink-title-row">
                <span>STRAWBERRY SMOOTHIE <small class="drink-badge">NEW</small></span>
                <span class="drink-price">IDR 55.000</span>
            </div>
            <p>Fresh strawberries blended with yogurt and honey.</p>
            </div>
        </div>

        <div class="drink-item">
            <img src="lemon.jpg" class="drink-thumb">
            <div class="drink-text">
            <div class="drink-title-row">
                <span>LEMON ICED TEA</span>
                <span class="drink-price">IDR 40.000</span>
            </div>
            <p>Refreshing black tea mixed with fresh lemon juice.</p>
            </div>
        </div>

        <div class="drink-item">
            <img src="caramel.jpg" class="drink-thumb">
            <div class="drink-text">
            <div class="drink-title-row">
                <span>CARAMEL FRAPPE</span>
                <span class="drink-price">IDR 59.000</span>
            </div>
            <p>Blended coffee with caramel syrup and whipped cream.</p>
            </div>
        </div>
        </div>

        <div class="drink-image">
        <img src="mocktail.jpg" alt="">
        </div>

    </div>
    </section>


    <section class="additional-section container my-5">
        <h2 class="additional-title text-center mb-5">✦ Additional ✦</h2>

        <div class="row g-5">
            
            <div class="col-md-6 d-flex additional-item">
                <div class="additional-img hover-img" style="background-image: url('addon1.jpg');"></div>
                <a href="detail-additional.html">
                    <div class="additional-text ms-3">
                        <h4 class="additional-name clickable">Beluga Caviar
                            <span class="additional-price">IDR 1.800.000</span>
                        </h4>
                        <p class="additional-desc">Premium grade caviar with rich, buttery flavor and delicate texture.</p>
                    </div>
                </a>
            </div>

            <div class="col-md-6 d-flex additional-item">
                <div class="additional-img hover-img" style="background-image: url('addon2.jpg');"></div>
                <a href="detail-additional.html">
                    <div class="additional-text ms-3">
                        <h4 class="additional-name clickable">Ikura Salmon Roe 
                            <span class="additional-price">IDR 450.000</span>
                        </h4>
                        <p class="additional-desc">Bright, briny salmon pearls that add a burst of umami to any dish.</p>
                    </div>
                </a>
            </div>

            <div class="col-md-6 d-flex additional-item">
                <div class="additional-img hover-img" style="background-image: url('addon3.jpg');"></div>
                <a href="detail-additional.html">
                    <div class="additional-text ms-3">
                        <h4 class="additional-name clickable">Black Truffle Shavings
                            <span class="additional-price">IDR 950.000</span>
                        </h4>
                        <p class="additional-desc">Fresh black truffle slices, aromatic and earthy for a luxurious finish.</p>
                    </div>
                </a>
            </div>

            <div class="col-md-6 d-flex additional-item">
                <div class="additional-img hover-img" style="background-image: url('addon4.jpg');"></div>
                <a href="detail-additional.html">
                    <div class="additional-text ms-3">
                        <h4 class="additional-name clickable">Parmigiano Reggiano
                            <span class="additional-price">IDR 150.000</span>
                        </h4>
                        <p class="additional-desc">Aged Italian cheese with nutty, savory notes to elevate flavor depth.</p>
                    </div>
                </a>
            </div>

            <div class="col-md-6 d-flex additional-item">
                <div class="additional-img hover-img" style="background-image: url('addon5.jpg');"></div>
                <a href="detail-additional.html">
                    <div class="additional-text ms-3">
                        <h4 class="additional-name clickable">Uni Sea Urchin
                            <span class="additional-price">IDR 680.000</span>
                        </h4>
                        <p class="additional-desc">Creamy sea urchin with delicate sweetness and smooth brininess.</p>
                    </div>
                </a>
            </div>

            <div class="col-md-6 d-flex additional-item">
                <div class="additional-img hover-img" style="background-image: url('addon6.jpg');"></div>
                <a href="detail-additional.html">
                    <div class="additional-text ms-3">
                        <h4 class="additional-name clickable">Truffle Butter
                            <span class="additional-price">IDR 120.000</span>
                        </h4>
                        <p class="additional-desc">Smooth, aromatic butter infused with truffle for a rich, velvety touch.</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="footer">

        <div class="footer-content">

            <div class="footer-img-container">
                <img src="footer1.jpg" alt="Restaurant Interior" class="footer-side-img">
            </div>

            <div class="footer-center">

                <img src="logo1.png" alt="Restoria Logo" class="footer-logo-img">

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
                <img src="footer2.jpg" alt="Desserts img" class="footer-side-img">
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

    <script src="script.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>