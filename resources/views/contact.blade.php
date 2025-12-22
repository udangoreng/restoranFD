@extends('layout.index')
@section('style')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #0d2625;
            overflow-x: hidden;
            width: 100%;
        }

        .contact-hero, .contact-section, .left-content, .right-content {
            font-family: 'Georgia', 'Times New Roman', serif;
        }

        .contact-hero {
            position: relative;
            width: 100%;
            height: 100vh;
            min-height: 600px;
            max-height: 800px;
            overflow: hidden;
            margin-bottom: 40px;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            z-index: 1;
        }

        .hero-image {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .hero-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
        }

        .hero-content {
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            width: 100%;
            max-width: min(900px, 90vw);
            z-index: 2;
            padding: 0 20px;
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 5rem);
            font-weight: 700;
            margin-bottom: 25px;
            color: white;
            text-transform: uppercase;
            letter-spacing: clamp(2px, 0.4vw, 4px);
            font-family: 'Georgia', 'Times New Roman', serif;
            text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.5);
            line-height: 1.1;
            word-wrap: break-word;
            padding: 0 10px;
        }

        .hero-subtitle {
            font-size: clamp(1rem, 2vw, 2rem);
            line-height: 1.6;
            color: white;
            max-width: min(700px, 85vw);
            margin: 0 auto;
            letter-spacing: clamp(1px, 0.15vw, 1.5px);
            font-weight: 300;
            font-family: 'Georgia', serif;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4);
            padding: 0 15px;
            word-wrap: break-word;
        }

        .hero-content::after {
            content: '';
            display: block;
            width: clamp(60px, 10vw, 100px);
            height: 3px;
            background-color: #c89b3c;
            margin: 30px auto 0;
        }

        .contact-section {
            width: 100%;
            padding: clamp(40px, 8vw, 80px) clamp(20px, 4vw, 60px);
            background: #18312E;
            box-sizing: border-box;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: -100px;
            position: relative;
            z-index: 2;
        }

        .unified-container {
            width: 100%;
            max-width: min(1300px, 95vw);
            background: #0f201e;
            border-radius: 15px;
            border: 3px solid #c89b3c;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
            display: flex;
            padding: clamp(25px, 3vw, 40px);
            gap: clamp(25px, 4vw, 50px);
            align-items: center;
            position: relative;
            z-index: 3;
            flex-wrap: wrap;
        }

        .left-content {
            width: 45%;
            min-width: 300px;
            flex: 1 1 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .image-frame {
            width: 50%;
            max-width: 350px;
            min-width: 200px;
            margin: 0 auto;
            border-radius: 150px 150px 0 0;
            overflow: hidden;
            border: 4px solid #c89b3c;
            position: relative;
            height: clamp(180px, 25vw, 280px);
            box-shadow: 0 8px 25px rgba(200, 155, 60, 0.3);
            aspect-ratio: 1.25;
        }

        .image-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .resto-info {
            width: 100%;
            margin-top: clamp(25px, 3vw, 40px);
            padding: 0 10px;
        }

        .resto-title {
            margin-top: 0;
            font-size: clamp(28px, 3.5vw, 42px);
            font-weight: bold;
            letter-spacing: clamp(1px, 0.15vw, 1.5px);
            font-family: 'Times New Roman', serif;
            margin-bottom: 5px;
            color: #c89b3c;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            word-wrap: break-word;
        }

        .resto-subtitle {
            margin-top: 0;
            font-size: clamp(12px, 1.2vw, 16px);
            color: #c89b3c;
            letter-spacing: clamp(2px, 0.4vw, 4px);
            text-transform: uppercase;
            margin-bottom: 25px;
            position: relative;
            font-weight: 500;
            word-wrap: break-word;
        }

        .resto-subtitle::before,
        .resto-subtitle::after {
            content: "+";
            margin: 0 clamp(5px, 1vw, 10px);
            color: #c89b3c;
            font-weight: bold;
        }

        .visit-title {
            margin: clamp(20px, 2.5vw, 30px) 0 clamp(15px, 2vw, 25px) 0;
        }

        .visit-title span {
            color: #c89b3c;
            font-size: clamp(12px, 1vw, 15px);
            display: inline-block;
            letter-spacing: clamp(2px, 0.3vw, 3px);
            font-weight: 500;
            position: relative;
            padding: 0 5px;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
            word-wrap: break-word;
        }

        .visit-title span::before,
        .visit-title span::after {
            content: "•";
            margin: 0 clamp(5px, 0.8vw, 8px);
            font-size: 14px;
            color: #c89b3c;
        }

        .address {
            line-height: 1.9em;
            font-size: clamp(13px, 1.1vw, 15px);
            letter-spacing: 0.3px;
            max-width: min(280px, 90%);
            margin: 0 auto;
            text-align: center;
            color: #e0e0e0;
            word-wrap: break-word;
        }

        .address br {
            display: block;
            margin-bottom: 8px;
        }

        .right-content {
            width: 55%;
            min-width: 300px;
            flex: 1 1 300px;
            padding-left: clamp(20px, 3vw, 30px);
            border-left: 2px solid rgba(200, 155, 60, 0.3);
        }

        .write-title {
    text-align: center;
    font-size: clamp(14px, 1.1vw, 16px);
    margin-bottom: clamp(10px, 2vw, 15px); /* Responsif untuk semua layar */
    color: #c89b3c;
    font-weight: 400;
    letter-spacing: 1px;
    text-transform: uppercase;
    word-wrap: break-word;
}

.message-title {
    text-align: center;
    font-size: clamp(24px, 2.5vw, 32px);
    margin-bottom: clamp(25px, 3vw, 35px);
    margin-top: clamp(5px, 1vw, 10px); /* Tambah margin-top juga */
    color: #c89b3c;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    word-wrap: break-word;
}

        form input,
        form textarea {
            width: 100%;
            padding: clamp(14px, 1.5vw, 18px);
            margin-bottom: clamp(15px, 1.5vw, 20px);
            border: 1px solid #2a4a46;
            border-radius: 4px;
            font-size: clamp(14px, 1.1vw, 15px);
            outline: none;
            box-sizing: border-box;
            transition: all 0.3s;
            background-color: #18312E;
            color: white;
        }

        form input::placeholder,
        form textarea::placeholder {
            color: #a0a0a0;
        }

        form input:focus,
        form textarea:focus {
            border-color: #c89b3c;
            box-shadow: 0 0 0 2px rgba(200, 155, 60, 0.2);
        }

        form textarea {
            height: clamp(100px, 15vw, 120px);
            resize: vertical;
            min-height: 100px;
            font-family: inherit;
        }

        form button {
            width: 100%;
            padding: clamp(14px, 1.5vw, 18px);
            background: linear-gradient(to right, #c89b3c, #b68a35);
            border: none;
            color: #18312E;
            font-size: clamp(14px, 1.2vw, 16px);
            cursor: pointer;
            border-radius: 6px;
            transition: all 0.3s;
            font-weight: 600;
            letter-spacing: 1px;
            margin-top: 10px;
            text-transform: uppercase;
            box-shadow: 0 4px 15px rgba(200, 155, 60, 0.3);
        }

        form button:hover {
            background: linear-gradient(to right, #b68a35, #a5792d);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(200, 155, 60, 0.4);
            color: #0f201e;
        }

        form button:active {
            transform: translateY(-1px);
        }

        /* Responsive Breakpoints */
        @media (max-width: 1100px) {
            .unified-container {
                gap: 30px;
            }
            
            .left-content, .right-content {
                width: 100%;
                min-width: 100%;
            }
            
            .right-content {
                padding-left: 0;
                border-left: none;
                border-top: 2px solid rgba(200, 155, 60, 0.3);
                padding-top: clamp(30px, 4vw, 40px);
            }
            
            .image-frame {
                width: clamp(50%, 60vw, 70%);
                height: auto;
            }
        }

        @media (max-width: 1024px) {
            .contact-hero {
                height: 70vh;
                min-height: 500px;
                max-height: 600px;
            }
            
            .hero-content {
                top: 50%;
            }
        }

        @media (max-width: 900px) {
            .unified-container {
                flex-direction: column;
            }
            
            .left-content, .right-content {
                width: 100%;
            }
            
            .image-frame {
                width: clamp(60%, 70vw, 80%);
                max-width: 400px;
            }
        }

        @media (max-width: 768px) {
            .contact-hero {
                height: 60vh;
                min-height: 400px;
                max-height: 500px;
                margin-bottom: 30px;
            }
            
            .hero-title {
                margin-bottom: 20px;
            }
            
            .hero-subtitle {
                line-height: 1.5;
            }
            
            .hero-content::after {
                margin: 20px auto 0;
            }
            
            .contact-section {
                margin-top: -60px;
            }
            
            .unified-container {
                padding: 25px 20px;
                border-radius: 12px;
                border-width: 2px;
            }
            
            .image-frame {
                width: clamp(70%, 80vw, 90%);
                border-radius: 120px 120px 0 0;
            }
            
            .visit-title span {
                display: block;
                padding: 5px 0;
            }
            
            .visit-title span::before,
            .visit-title span::after {
                display: inline;
            }
        }

        @media (max-width: 600px) {
            .contact-hero {
                height: 50vh;
                min-height: 350px;
                max-height: 450px;
            }
            
            .hero-content {
                padding: 0 15px;
            }
            
            .contact-section {
                padding: 30px 15px;
                margin-top: -40px;
            }
            
            .unified-container {
                padding: 20px 15px;
                gap: 20px;
                border-width: 1px;
            }
            
            .image-frame {
                border-radius: 100px 100px 0 0;
                border-width: 3px;
            }
            
            .resto-info {
                margin-top: 20px;
            }
            
            .resto-subtitle::before,
            .resto-subtitle::after {
                margin: 0 5px;
            }
            
            form input,
            form textarea {
                padding: 12px;
                margin-bottom: 15px;
            }
        }

        @media (max-width: 480px) {
            .contact-hero {
                height: 45vh;
                min-height: 300px;
                max-height: 400px;
            }
            
            .hero-title {
                font-size: 2rem;
                padding: 0 5px;
            }
            
            .hero-subtitle {
                font-size: 0.9rem;
                padding: 0 10px;
            }
            
            .contact-section {
                padding: 25px 10px;
                margin-top: -30px;
            }
            
            .unified-container {
                padding: 15px 10px;
            }
            
            .image-frame {
                width: 85%;
                border-radius: 80px 80px 0 0;
                border-width: 2px;
            }
            
            .resto-title {
                font-size: 24px;
            }
            
            .resto-subtitle {
                font-size: 11px;
            }
            
            .message-title {
                font-size: 20px;
            }
            
            .address {
                font-size: 12px;
            }
            
            form button {
                padding: 12px;
                font-size: 14px;
            }
        }

        @media (max-width: 360px) {
            .contact-hero {
                height: 40vh;
                min-height: 280px;
            }
            
            .hero-title {
                font-size: 1.8rem;
            }
            
            .image-frame {
                width: 90%;
                border-radius: 60px 60px 0 0;
            }
            
            .resto-title {
                font-size: 22px;
            }
            
            .visit-title span {
                font-size: 11px;
            }
            
            .write-title {
                font-size: 12px;
            }
            
            .message-title {
                font-size: 18px;
            }
        }

        /* Landscape orientation */
        @media (max-height: 600px) and (orientation: landscape) {
            .contact-hero {
                height: 100vh;
                min-height: 400px;
            }
            
            .hero-content {
                top: 50%;
            }
            
            .hero-title {
                font-size: 2.5rem;
                margin-bottom: 15px;
            }
            
            .hero-subtitle {
                font-size: 1rem;
                max-width: 90%;
            }
            
            .contact-section {
                padding: 40px 20px;
            }
        }

        /* Print styles */
        @media print {
            body {
                background: white;
                color: black;
            }
            
            .contact-hero {
                height: auto;
                min-height: auto;
                max-height: none;
            }
            
            .hero-overlay {
                background: rgba(0, 0, 0, 0.2);
            }
            
            .hero-title, .hero-subtitle {
                color: black;
                text-shadow: none;
            }
            
            .contact-section {
                background: white;
                margin-top: 0;
            }
            
            .unified-container {
                border: 1px solid #ccc;
                background: white;
                box-shadow: none;
            }
            
            .resto-title, .resto-subtitle, .visit-title span,
            .write-title, .message-title {
                color: #333;
            }
            
            form input, form textarea {
                background: white;
                color: black;
                border: 1px solid #ccc;
            }
            
            form button {
                background: #ccc;
                color: black;
                box-shadow: none;
            }
        }
    </style>
@endsection

@section('content')
    <div class="preload" data-preload>
        <div class="circle"></div>
        <p class="text">Courvoiser</p>
    </div>

    @include('layout.components.navbar')
    <section class="contact-hero">
        <div class="hero-image">
            <img src="{{ asset('img/background.jpeg') }}" alt="Restaurant background" width="20">
            <div class="hero-overlay"></div>
        </div>
        
        <div class="hero-content">
            <h1 class="hero-title">Contact Us</h1>
            <p class="hero-subtitle">
                A taste of perfection in every dish—fine dining with a modern twist
            </p>
        </div>
    </section>

    <section class="contact-section">
        <div class="unified-container">
            <div class="left-content">
                <div class="image-frame">
                    <img src="{{ asset('img/contact.jpg') }}" alt="Restaurant interior" width="20">
                </div>

                <div class="resto-info">
                    <h2 class="resto-title">Courvoisier</h2>
                    <p class="resto-subtitle">Restaurant</p>

                    <div class="visit-title">
                        <span>• VISIT US •</span>
                    </div>

                    <p class="address">
                        Courvoisier, Jl Ketintang Barat A <br>
                        Breakfast - 08.00 am to 10.00 am <br>
                        Lunch Time - 11.00 am to 05.00 pm <br>
                        Dinner Time - 06.00 pm to 08.00 pm <br>
                    </p>
                </div>
            </div>

            <div class="right-content">
                <h3 class="write-title">Write to Us</h3>
                <h2 class="message-title">Message Us</h2>

                <form>
                    <input type="text" placeholder="Nama">
                    <input type="email" placeholder="Email">
                    <input type="text" placeholder="No.Tlp">
                    <textarea placeholder="Message"></textarea>

                    <button type="submit">Send Your Message</button>
                </form>
            </div>
        </div>
    </section>

    @include('layout.components.footer')
@endsection