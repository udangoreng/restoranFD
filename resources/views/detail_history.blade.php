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

    <section class="history-section">
        <div class="history-hero">
            <div class="history-hero-overlay"></div>
            <div class="history-hero-content">
            <p class="history-hero-text">
                Thank you for dining with us 
                <span class="history-gold-text">your experience matters.</span>
            </p>
            </div>
        </div>

        <div class="history-header">
            <p class="history-subtitle">✦ My History ✦</p>
            <h1 class="history-title">Reservation History</h1>
            <p class="history-note">
                Thank you for dining with us. Below are your completed reservation details and experience.
            </p>
        </div>

        <div class="history-container">
            <div class="history-card">
                <div class="history-status">
                    <span class="status-completed">Completed</span>
                    <span class="history-id">ID: RSV-20251207-0098</span>
                </div>

                <div class="history-info-grid">
                    <div><strong>Name:</strong> Princy Timberlake</div>
                    <div><strong>Phone:</strong> +62 812-3456-7890</div>
                    <div><strong>Guests:</strong> 4 People</div>
                    <div><strong>Date:</strong> 25 December 2025</div>
                    <div><strong>Time:</strong> 07:30 PM</div>
                </div>

                <div class="history-box">
                    <h3>Special Request (During Your Visit)</h3>
                    <ul>
                    <li>Window seat</li>
                    <li>Birthday setup</li>
                    <li>Non-smoking area</li>
                    </ul>
                </div>

                <div class="history-box">
                    <h3>Ordered Menu</h3>

                    <div class="history-menu-row">
                    <span>Peach Bruschetta × 1</span>
                    <span>IDR 140.000</span>
                    </div>

                    <div class="history-menu-row">
                    <span>Herb Roasted Salmon × 1</span>
                    <span>IDR 185.000</span>
                    </div>

                    <div class="history-menu-row">
                    <span>Garlic Butter Lobster × 1</span>
                    <span>IDR 320.000</span>
                    </div>

                    <div class="history-menu-row">
                    <span>Caramel Pannacotta × 1</span>
                    <span>IDR 105.000</span>
                    </div>

                    <div class="history-menu-row">
                    <span>Lychee Rose Mocktail × 2</span>
                    <span>IDR 73.000</span>
                    </div>

                    <div class="history-menu-row">
                    <span>Strawberry Mocktail × 1</span>
                    <span>IDR 55.000</span>
                    </div>

                    <div class="history-total">
                    <div><span>Subtotal</span><span>IDR 951.000</span></div>
                    <div><span>Tax</span><span>IDR 95.100</span></div>
                    <div class="grand-total">
                        <span>Total</span>
                        <span>IDR 1.046.100</span>
                    </div>
                    </div>
                </div>

                <div class="history-review-box">
                    <h3>Your Review</h3>

                    <div class="history-stars">
                        <span data-value="1">★</span>
                        <span data-value="2">★</span>
                        <span data-value="3">★</span>
                        <span data-value="4">★</span>
                        <span data-value="5">★</span>
                    </div>

                    <textarea class="history-review-input" placeholder="Share your dining experience with us..."></textarea>

                    <button class="history-review-btn">Send Review</button>
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
    <script src="history.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>