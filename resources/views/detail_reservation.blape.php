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

    <section class="reservation-hero">
    <div class="reservation-hero-overlay"></div>
    <div class="reservation-hero-content">
        <p class="reservation-hero-text">
        Your table has been successfully reserved 
        <span class="reservation-gold-text">we look forward to serving you.</span>
        </p>
    </div>
    </section>

    <section class="reservation-section">
        <div class="reservation-header">
            <p class="reservation-subtitle">✦ My Reservation ✦</p>
            <h1 class="reservation-title">Reservation Details</h1>
            <p class="reservation-note">Thank you for your reservation. Below are the details of your booking.</p>
        </div>

        <div class="reservation-grid">

            <div class="reservation-left">

                <div class="reservation-card reservation-info-card">
                    <div class="reservation-card-row">
                    <div class="reservation-label">Reservation ID</div>
                    <div class="reservation-value">#RSV-20251207-0098</div>
                    </div>

                    <div class="reservation-card-row">
                    <div class="reservation-label">Full Name</div>
                    <div class="reservation-value">Princy Timberlake</div>
                    </div>

                    <div class="reservation-card-row">
                    <div class="reservation-label">Phone</div>
                    <div class="reservation-value">+62 812-3456-7890</div>
                    </div>

                    <div class="reservation-card-row">
                    <div class="reservation-label">Guests</div>
                    <div class="reservation-value">4 Persons</div>
                    </div>

                    <div class="reservation-card-row">
                    <div class="reservation-label">Date</div>
                    <div class="reservation-value">25 December 2025</div>
                    </div>

                    <div class="reservation-card-row">
                    <div class="reservation-label">Time</div>
                    <div class="reservation-value">07:30 PM</div>
                    </div>

                    <div class="reservation-card-row">
                    <div class="reservation-label">Status</div>
                    <div class="reservation-value">
                        <span class="reservation-badge reservation-badge-confirmed">Confirmed</span>
                    </div>
                    </div>
                </div>

                <div class="reservation-card reservation-requests">
                    <h3 class="reservation-card-title">Special Request</h3>
                    <ul class="reservation-requests-list">
                    <li>Table near window</li>
                    <li>Birthday setup (one small candle)</li>
                    <li>Non-smoking area</li>
                    </ul>
                </div>

                <div class="reservation-card reservation-message">
                    <h3 class="reservation-card-title">Message from You</h3>
                    <p class="reservation-message-text">Please place the cake on the center table and dim lights around 9:00 PM. Thank you!</p>
                </div>

            </div>

            <div class="reservation-right">

                <div class="reservation-card reservation-order">
                    <h3 class="reservation-card-title">Ordered Menu</h3>

                    <table class="reservation-menu-table" aria-label="Ordered menu">
                    <thead>
                        <tr>
                        <th>Item</th>
                        <th class="reservation-qty">Qty</th>
                        <th class="reservation-price">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td class="menu-name">Peach Bruschetta</td>
                        <td class="reservation-qty">1</td>
                        <td class="reservation-price">IDR 140.000</td>
                        </tr>
                        <tr>
                        <td class="menu-name">Herb Roasted Salmon</td>
                        <td class="reservation-qty">1</td>
                        <td class="reservation-price">IDR 185.000</td>
                        </tr>
                        <tr>
                        <td class="menu-name">Garlic Butter Lobster</td>
                        <td class="reservation-qty">1</td>
                        <td class="reservation-price">IDR 320.000</td>
                        </tr>
                        <tr>
                        <td class="menu-name">Caramel Pannacotta</td>
                        <td class="reservation-qty">1</td>
                        <td class="reservation-price">IDR 105.000</td>
                        </tr>
                        <tr>
                        <td class="menu-name"> Lychee Rose Mocktail <div class="menu-note">less sugar</div></td>
                        <td class="reservation-qty">2</td>
                        <td class="reservation-price">IDR 73.000</td>
                        </tr>
                        <tr>
                        <td class="menu-name">Strawberry Smoothie <div class="menu-note">no ice</div></td>
                        <td class="reservation-qty">1</td>
                        <td class="reservation-price">IDR 55.000</td>
                        </tr>
                    </tbody>
                    </table>

                    <div class="reservation-summary">
                    <div class="summary-row"><span>Subtotal</span><span>IDR 951.000</span></div>
                    <div class="summary-row"><span>Tax (10%)</span><span>IDR 95.100</span></div>
                    <div class="summary-row summary-total"><span>Total</span><span>IDR 1.046.100</span></div>
                    </div>
                </div>

                <div class="reservation-actions">
                    <button class="reservation-btn reservation-btn-primary">Download Invoice (PDF)</button>
                    <div class="reservation-actions-row">
                    <button class="reservation-btn reservation-btn-outline">Modify Reservation</button>
                    <button class="reservation-btn reservation-btn-cancel">Cancel Reservation</button>
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

    <div id="popupContainer"></div>

    <link rel="stylesheet" href="cancelPopup.css">

    <script>
    fetch("Cancel_popup.html")
        .then(res => res.text())
        .then(html => {
            document.getElementById("popupContainer").innerHTML = html;
        })
        .then(() => {
            import("./cancel.js").then(module => {
                module.initCancelPopup();
            });
        });
    </script>

    <script src="script.js"></script>
    <script src="cancel.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>