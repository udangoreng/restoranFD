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
                <li><a class="active" href="home.html">home</a></li>
                <li><a href="menu.html">menu</a></li>
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
        <h1 class="serif">WHERE<br>TASTE MEETS</h1>
        <h2 class="script">elegance</h2>

        <div class="banner">
            <video autoplay loop muted plays-inline>
                <source src="video.mp4" type="video/mp4">
            </video>
        </div>
    </section>

    <section class="delicious-section">
        <div class="logo-wrap">

            <div class="arc-text">
                <svg width="400" height="160">
                    <defs>
                        <path id="curve" d="M 20 150 A 208 220 0 0 1 400 160" />
                    </defs>

                    <text width="400">
                        <textPath xlink:href="#curve" startOffset="50%" text-anchor="middle">
                            ✦ SPECIAL • FINE • DINE ✦
                        </textPath>
                    </text>
                </svg>
            </div>

            <div class="icon">
                <img src="logo.png" alt="icon">
            </div>

        </div>

        <h2>Delicious Selections</h2>
    </section>

    <section class="menu-section">
        <div class="menu-container">

            <div class="menu-card">
                <div class="img-arch">
                    <img src="appetizer.jpg" alt="">
                    <span class="arch-border"></span>
                </div>

                <h3>Appetizers</h3>
                <p>Small bites, big flavors — the perfect beginning to your dining experience</p>
                <a href="#" class="btn-menu">VIEW MENU</a>
            </div>

            <div class="menu-card">
                <div class="img-arch">
                    <img src="main.jpg" alt="">
                    <span class="arch-border"></span>
                </div>

                <h3>Main Dishes</h3>
                <p>Bold flavors and masterful creations for a truly unforgettable main course</p>
                <a href="#" class="btn-menu">VIEW MENU</a>
            </div>

            <div class="menu-card">
                <div class="img-arch">
                    <img src="dessert.jpg" alt="">
                    <span class="arch-border"></span>
                </div>

                <h3>Desserts</h3>
                <p>End your meal on a sweet note with irresistible dessert creations</p>
                <a href="#" class="btn-menu">VIEW MENU</a>
            </div>
        </div>
    </section>

    <section class="our-story">
        <p class="story-subtitle">✦ OUR STORY ✦</p>

        <h2 class="story-title">
            Enjoy Every Moment with Tasty
        </h2>

        <div class="story-row">
            <img src="gambar1.jpg" class="story-img left" alt="">
            <h3 class="story-highlight">Breakfast, Hearty</h3>
            <img src="gambar2.jpg" class="story-img right" alt="">
        </div>

        <div class="story-row">
            <h3 class="story-highlight">Mains&nbsp;&</h3>
            <img src="gambar3.jpg" class="story-img left" alt="">
            <h3 class="story-highlight">Drinks</h3>
        </div>
    </section>

    <section class="story-section">
        <div class="story-left">

            <p class="story-desc">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum has been the
                industry's standard dummy text ever since the when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into.
            </p>

            <div class="story-feature">
                <div class="feat-box">
                    <img src="hygenic.png" class="feat-icon">
                    <h3>HYGIENIC<br>FOOD</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and type setting dummy text.</p>
                </div>

                <div class="feat-box">
                    <img src="ambience.png" class="feat-icon">
                    <h3>FRESH<br>AMBIENCE</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and type setting dummy text.</p>
                </div>
            </div>

            <div class="story-contact">
                <p class="req">Booking Request :</p>
                <p class="phone">+80 (400) 123 4567</p>

                <a href="#" class="book-table-btn">BOOK A TABLE</a>
            </div>
        </div>

        <div class="story-right">
            <div class="arc-image-wrap">
                <img src="gambar4.jpg" class="arc-image">
                <span class="arc-border"></span>
            </div>
        </div>
    </section>

    <section id="reviews" class="py-5">
        <div class="container text-center">

            <p class="review-subtitle">✦ Reviews ✦</p>
            <h2 class="review-title">Happy Testimonials</h2>

            <div class="row justify-content-center mt-4 g-4">

                <div class="col-md-3">
                    <div class="review-box">
                        <img src="testimoni1.png" alt="Review 1">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="review-box">
                        <img src="testimoni2.png" alt="Review 2">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="review-box">
                        <img src="testimoni3.png" alt="Review 3">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="review-box">
                        <img src="testimoni4.png" alt="Review 4">
                    </div>
                </div>

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