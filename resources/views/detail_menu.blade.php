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
                    <a href="my-reservation.html" class="mobile-link">
                        <span class="star">✦</span>
                        My Reservation
                        <span class="arrow">›</span>
                    </a>
                </li>

                <li>
                    <a href="my-history.html" class="mobile-link">
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

    <section class="container my-4 detail-menu-section">
        <div class="row align-items-start detail-menu-box p-4">
            
            <div class="col-md-4 d-flex justify-content-center">
                <div class="detail-menu-image-circle">
                    <img src="appetizer1.jpg" 
                        alt="Gambar Menu" 
                        class="detail-menu-image">
                </div>
            </div>

            <div class="col-md-8 mt-4 mt-md-0 detail-menu-text">
                <h2 class="detail-menu-title">Grilled Caesar Salad</h2>
                <p class="detail-menu-sub">Neight : 320-380 kcal | Category : Salad</p>

                <p class="detail-menu-desc">
                  
                   The Grilled Caesar Salad features lightly charred romaine lettuce that brings a subtle smoky aroma, 
                   paired with a rich, creamy house-made Caesar dressing. Finished with crisp croutons, parmesan shavings, and tender grilled chicken, 
                   this appetizer offers a perfect balance of freshness and savory depth light yet indulgent.
                   
                   Approximately 320–380 kcal per serving (depending on the amount of dressing and added grilled chicken).
                </p>

                <h4 class="detail-menu-price">IDR 175.000</h4>
            </div>
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