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
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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

        <section id="header" style="visibility: hidden;">
            <a href="#"><img src="logo.png" class="logo" alt=""></a>

            <div>
                <ul id="navbar">
                    <li><a class="active" href="home.html">home</a></li>
                    <li><a href="menu.html">shop</a></li>
                    <li><a href="about us.html">about</a></li>
                    <li><a href="contact.html">contact</a></li>
                </ul>
            </div>

            <a href="reservation.html" class="book-btn">BOOK A TABLE</a>

            <div id="mobile">
                <i id="bar" class="fa-solid fa-bars"></i>
            </div>
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


    <script src="{{ asset('js/script.js') }}"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
