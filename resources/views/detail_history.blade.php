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
                    <span class="history-id">{{ $reservation->reservation_code }}</span>
                </div>

                <div class="history-info-grid">
                    <div><strong>Name:</strong> {{ $reservation->first_name . ' ' . $reservation->last_name }}</div>
                    <div><strong>Phone:</strong> {{ $reservation->phone }}</div>
                    <div><strong>Guests:</strong>{{ $reservation->person_attend }} People</div>
                    <div><strong>Date:</strong> {{ \Carbon\Carbon::parse($reservation->booking_date)->format('j F Y') }}
                    </div>
                    <div><strong>Time:</strong> {{ \Carbon\Carbon::parse($reservation->time_in)->format('H:i A') }}</div>
                </div>

                <div class="history-box">
                    <h3>Special Request (During Your Visit)</h3>
                    <ul>
                        <li>{{ $reservation->request }}</li>
                    </ul>
                </div>

                <div class="history-box">
                    <h3>Ordered Menu</h3>
                    @foreach ($reservation->orders as $items)
                        @foreach ($items->carts as $item)
                            <div class="history-menu-row">
                                <span>{{ $item->menu->name }}</span>
                                <span>@currency($item->subtotal)</span>
                            </div>
                        @endforeach
                    @endforeach

                    <div class="history-total">
                        <div><span>Subtotal</span><span>@currency($items->total_amount)</span></div>
                        <div><span>Tax</span><span>@currency($items->total_amount * 0.1)</span></div>
                        <div class="grand-total">
                            <span>Total</span>
                            <span>@currency($items->total_amount + $items->total_amount * 0.1)</span>
                        </div>
                    </div>
                    <button
                        class="reservation-btn reservation-btn-primary"{{ $reservation->status == 'Created' || $reservation->status == 'Pending Payment' ? 'disabled' : '' }}>
                        <a href="{{ route('invoice.download', $reservation->id) }}">
                            Download
                            Invoice (PDF)
                        </a>
                    </button>
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
    <script src="{{ asset('js/history.js') }}"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
@endsection
