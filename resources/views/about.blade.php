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
                <li><a href="menu.html">menu</a></li>
                <li><a class="active" href="about.html">about</a></li>
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

    <section class="about-section">
        <div class="overlay"></div>
        <div class="content">
            <h1>About Us</h1>
            <p>
                A taste of perfection in every dish – 
                <span class="gold-text">fine dining with a modern twist.</span>
            </p>
        </div>
    </section>

    <section class="why-dine">
        <div class="section-title">
            <p class="subtitle">✦ WHY CHOOSE US ✦</p>
            <h2>Why Dine With Us</h2>
        </div>

        <div class="features">
            <div class="feature-card">
                <img src="chef.jpg" alt="">
                <h3>SKILLED CHEF</h3>
            </div>

            <div class="feature-card">
                <img src="hygenicfood.jpg" alt="">
                <h3>HYGIENIC FOOD</h3>
            </div>

            <div class="feature-card">
                <img src="freshambience.jpg" alt="">
                <h3>FRESH AMBIENCE</h3>
            </div>

            <div class="feature-card">
                <img src="recipe.jpg" alt="">
                <h3>SECRET RECIPE</h3>
            </div>
        </div>

        <div class="stats">
            <div class="stat-box">
                <h1>60+</h1>
                <p class="stat-title">MONTHLY VISITORS</p>
                <p class="stat-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>

            <div class="stat-box">
                <h1>22+</h1>
                <p class="stat-title">POSITIVE REVIEWS</p>
                <p class="stat-desc">Simply dummy text of the printing and typesetting industry lorem Ipsum has been.</p>
            </div>

            <div class="stat-box">
                <h1>135+</h1>
                <p class="stat-title">SECRET RECIPE</p>
                <p class="stat-desc">Simply dummy text of the printing and typesetting lorem Ipsum has been industry.</p>
            </div>

            <div class="stat-box">
                <h1>10+</h1>
                <p class="stat-title">AWARD & HONORS</p>
                <p class="stat-desc">Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum.</p>
            </div>
        </div>
    </section>

    <section class="chef-section">
        <div class="left-content">
            <p class="sub-title">✦ MEET OUR CHEF ✦</p>
            <h1 class="chef-name">Master Chef Alessandro</h1>
            <p class="chef-desc">
                A fine dine master chef crafts exquisite cuisine with precision, passion, 
                creativity, and elegance, delivering unforgettable culinary experiences and refined flavors.
            </p>
            <button class="team-btn">Meet The Team</button>
        </div>

        <div class="chef-photo-wrapper">
            <div class="chef-photo">
                <img src="chef-main.jpg" alt="Chef Photo">
            </div>

            <div class="experience-badge">
                <img src="badge.png" alt="Experience Badge">
            </div>
        </div>

        <div class="side-images">
            <img src="chef.jpg" class="side-img top-img" alt="">
            <img src="chef-main1.jpg" class="side-img bottom-img" alt="">
        </div>
    </section>

    <section class="gallery-section">
        <h2 class="gallery-title">✦ Restoria Gallery ✦</h2>

        <div class="gallery-wrapper">
        <div class="gallery-track" id="galleryTrack">
            <img src="img1.jpg">
            <img src="img2.jpg">
            <img src="img3.jpg">
            <img src="img4.jpg">
            <img src="img5.jpg">

            <img src="img4.jpg">
            <img src="img2.jpg">
            <img src="img3.jpg">
            <img src="img1.jpg">
            <img src="img5.jpg">
        </div>

        <div class="hover-zone left" id="hoverLeft"></div>
        <div class="hover-zone right" id="hoverRight"></div>
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