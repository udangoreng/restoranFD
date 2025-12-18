@extends('layout.index')
@section('content')
    <div class="preload" data-preload>
        <div class="circle"></div>
        <p class="text">Courvoiser</p>
    </div>

    @include('layout.components.navbar')

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
                <img src="{{asset('img/chef.jpg')}}" alt="">
                <h3>SKILLED CHEF</h3>
            </div>

            <div class="feature-card">
                <img src="{{asset('img/hygenicfood.jpg')}}" alt="">
                <h3>HYGIENIC FOOD</h3>
            </div>

            <div class="feature-card">
                <img src="{{asset('img/freshambience.jpg')}}" alt="">
                <h3>FRESH AMBIENCE</h3>
            </div>

            <div class="feature-card">
                <img src="{{asset('img/recipe.jpg')}}" alt="">
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
                <img src="{{asset('img/chef-main.jpg')}}" alt="Chef Photo">
            </div>

            <div class="experience-badge">
                <img src="{{asset('img/badge.png')}}" alt="Experience Badge">
            </div>
        </div>

        <div class="side-images">
            <img src="{{asset('img/chef.jpg')}}" class="side-img top-img" alt="">
            <img src="{{asset('img/chef-main1.jpg')}}" class="side-img bottom-img" alt="">
        </div>
    </section>

    <section class="gallery-section">
        <h2 class="gallery-title">✦ Restoria Gallery ✦</h2>

        <div class="gallery-wrapper">
            <div class="gallery-track" id="galleryTrack">
                <img src= {{asset("img/img1.jpg")}}>
                <img src= {{asset("img/img2.jpg")}}>
                <img src= {{asset("img/img3.jpg")}}>
                <img src= {{asset("img/img4.jpg")}}>
                <img src= {{asset("img/img5.jpg")}}>

                <img src= {{asset("img/img4.jpg")}}>
                <img src= {{asset("img/img2.jpg")}}>
                <img src= {{asset("img/img3.jpg")}}>
                <img src= {{asset("img/img1.jpg")}}>
                <img src= {{asset("img/img5.jpg")}}>
            </div>

            <div class="hover-zone left" id="hoverLeft"></div>
            <div class="hover-zone right" id="hoverRight"></div>
        </div>
    </section>

    @include('layout.components.footer')
@endsection
