@extends('layout.index')
@section('content')
    <div class="preload" data-preload>
        <div class="circle"></div>
        <p class="text">Courvoiser</p>
    </div>

    @include('layout.components.navbar')
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


    @include('layout.components.footer')
@endsection

@section('script')
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{asset('js/history.js')}}"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
@endsection
