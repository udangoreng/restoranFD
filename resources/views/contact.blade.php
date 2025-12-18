@extends('layout.index')
@section('style')
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: #18312E;
    overflow-x: hidden;
}

.contact-her0, .contact-section, .left-content, .right-content{
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
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: white;
    width: 100%;
    max-width: 900px;
    z-index: 2;
    padding: 0 20px;
}

.hero-title {
    font-size: 5rem;
    font-weight: 700;
    margin-bottom: 25px;
    color: white;
    text-transform: uppercase;
    letter-spacing: 4px;
    font-family: 'Georgia', 'Times New Roman', serif;
    text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.5);
    line-height: 1.1;
}

.hero-subtitle {
    font-size: 1.4rem;
    line-height: 1.6;
    color: white;
    max-width: 700px;
    margin: 0 auto;
    letter-spacing: 1.5px;
    font-weight: 300;
    font-family: 'Georgia', serif;
    text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4);
}

.hero-content::after {
    content: '';
    display: block;
    width: 100px;
    height: 3px;
    background-color: #c89b3c;
    margin: 30px auto 0;
}

.contact-section {
    width: 100vw;
    padding: 80px 60px;
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
    max-width: 1300px;
    background: #0f201e;
    border-radius: 15px;
    border: 3px solid #c89b3c;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
    display: flex;
    padding: 40px;
    gap: 50px;
    align-items: center;
    position: relative;
    z-index: 3;
}

.left-content {
    width: 45%;
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
    margin: 0 auto;
    border-radius: 150px 150px 0 0;
    overflow: hidden;
    border: 4px solid #c89b3c;
    position: relative;
    height: 280px;
    box-shadow: 0 8px 25px rgba(200, 155, 60, 0.3);
}

.image-frame img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.resto-info {
    width: 100%;
    margin-top: 40px;
}

.resto-title {
    margin-top: 0;
    font-size: 42px;
    font-weight: bold;
    letter-spacing: 1.5px;
    font-family: 'Times New Roman', serif;
    margin-bottom: 5px;
    color: #c89b3c;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.resto-subtitle {
    margin-top: 0;
    font-size: 16px;
    color: #c89b3c;
    letter-spacing: 4px;
    text-transform: uppercase;
    margin-bottom: 25px;
    position: relative;
    font-weight: 500;
}

.resto-subtitle::before,
.resto-subtitle::after {
    content: "+";
    margin: 0 10px;
    color: #c89b3c;
    font-weight: bold;
}

.visit-title {
    margin: 30px 0 25px 0;
}

.visit-title span {
    color: #c89b3c;
    font-size: 15px;
    display: inline-block;
    letter-spacing: 3px;
    font-weight: 500;
    position: relative;
    padding: 0 5px;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

.visit-title span::before,
.visit-title span::after {
    content: "•";
    margin: 0 8px;
    font-size: 14px;
    color: #c89b3c;
}

.address {
    line-height: 1.9em;
    font-size: 15px;
    letter-spacing: 0.3px;
    max-width: 280px;
    margin: 0 auto;
    text-align: center;
    color: #e0e0e0;
}

.address br {
    display: block;
    margin-bottom: 8px;
}

.right-content {
    width: 55%;
    padding-left: 30px;
    border-left: 2px solid rgba(200, 155, 60, 0.3);
}

.write-title {
    text-align: center;
    font-size: 16px;
    margin-bottom: -10px;
    color: #c89b3c;
    font-weight: 400;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.message-title {
    text-align: center;
    font-size: 32px;
    margin-bottom: 35px;
    color: #c89b3c;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

form input,
form textarea {
    width: 100%;
    padding: 18px;
    margin-bottom: 20px;
    border: 1px solid #2a4a46;
    border-radius: 4px;
    font-size: 15px;
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
    height: 120px;
    resize: none;
    font-family: inherit;
}

form button {
    width: 100%;
    padding: 18px;
    background: linear-gradient(to right, #c89b3c, #b68a35);
    border: none;
    color: #18312E;
    font-size: 16px;
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

@media (max-width: 1024px) {
    .contact-hero {
        height: 70vh;
        min-height: 500px;
    }
    
    .hero-title {
        font-size: 4rem;
        letter-spacing: 3px;
    }
    
    .hero-subtitle {
        font-size: 1.2rem;
        letter-spacing: 1.2px;
    }
    
    .contact-section {
        padding: 60px 30px;
        margin-top: -80px;
    }
    
    .unified-container {
        flex-direction: column;
        gap: 40px;
        padding: 40px 30px;
    }
    
    .left-content, .right-content {
        width: 100%;
    }
    
    .right-content {
        padding-left: 0;
        border-left: none;
        border-top: 2px solid rgba(200, 155, 60, 0.3);
        padding-top: 40px;
    }
    
    .image-frame {
        width: 70%;
        height: 250px;
    }
}

@media (max-width: 768px) {
    .contact-hero {
        height: 60vh;
        min-height: 400px;
    }
    
    .hero-title {
        font-size: 3rem;
        letter-spacing: 2px;
        margin-bottom: 20px;
    }
    
    .hero-subtitle {
        font-size: 1rem;
        letter-spacing: 1px;
        line-height: 1.5;
    }
    
    .hero-content::after {
        width: 80px;
        height: 2px;
        margin: 20px auto 0;
    }
    
    .contact-section {
        padding: 50px 20px;
        margin-top: -60px;
    }
    
    .unified-container {
        padding: 35px 25px;
        gap: 30px;
        border-radius: 12px;
    }
    
    .image-frame {
        width: 90%;
        height: 220px;
    }
    
    .resto-title {
        font-size: 36px;
    }
    
    .resto-subtitle {
        font-size: 14px;
        letter-spacing: 3px;
    }
    
    .visit-title span {
        font-size: 14px;
    }
    
    .message-title {
        font-size: 28px;
    }
}

@media (max-width: 480px) {
    .contact-hero {
        height: 50vh;
        min-height: 350px;
    }
    
    .hero-title {
        font-size: 2.5rem;
        letter-spacing: 1.5px;
    }
    
    .hero-subtitle {
        font-size: 0.9rem;
    }
    
    .contact-section {
        padding: 40px 15px;
        margin-top: -50px;
    }
    
    .unified-container {
        padding: 25px 20px;
    }
    
    .resto-title {
        font-size: 32px;
    }
    
    .message-title {
        font-size: 24px;
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
             <img src="{{ asset('img/background.jpeg') }}" alt="icon contact" width="20">
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
                     <img src="{{ asset('img/contact.jpg') }}" alt="icon contact" width="20">
                </div>

                <div class="resto-info">
                    <h2 class="resto-title">Courvoisier</h2>
                    <p class="resto-subtitle">Restaurant</p>

                    <div class="visit-title">
                        <span>• VISIT US •</span>
                    </div>

                    <p class="address">
                        Courvoisier, Jl Ketintang Barat A <br>
                        Lunch Time - 10.00 am to 03.30 pm <br>
                        Dinner Time - 08.00 pm to 10.30 pm <br>
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
                    <textarea placeholder="Special Request"></textarea>

                    <button type="submit">Send Your Message</button>
                </form>
            </div>
        </div>
    </section>

    @include('layout.components.footer')
@endsection