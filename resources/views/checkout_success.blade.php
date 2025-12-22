{{-- resources/views/checkout_success.blade.php --}}
@extends('layout.index')
@section('content')
    <div class="preload" data-preload>
        <div class="circle"></div>
        <p class="text">Courvoiser</p>
    </div>

    @include('layout.components.navbar')
    <section class="reservation-hero">
        <div class="reservation-hero-overlay"></div>
        <div class="reservation-hero-content">
            <p class="reservation-hero-text">
                Your table has been successfully reserved
                <span class="reservation-gold-text">we look forward to serving you.</span>
            </p>
        </div>
    </section>

    <main style="min-height: 70vh; display: flex; align-items: center; justify-content: center;">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="checkout-box">
                        <h1 class="page-title mb-4">Payment Successful!</h1>

                        <div class="mb-4">
                            <i class="fas fa-check-circle" style="font-size: 80px; color: #c89b3c;"></i>
                        </div>

                        <h3 class="mb-3">Thank You for Your Payment</h3>

                        <p class="mb-4">
                            Your down payment has been received.
                            Please come to the restaurant at your reserved time.
                        </p>

                        @if (isset($order) && $order->reservation)
                            <div class="detail-group mb-4">
                                <div class="detail-label">Reservation Code:</div>
                                <div class="detail-value">{{ $order->reservation->reservation_code }}</div>
                            </div>
                        @endif

                        <div class="mt-4">
                            <a href="{{ route('reservation.see') }}" class="checkout-btn"
                                style="display: inline-block; width: auto; padding: 12px 30px;">
                                View My Reservations
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('layout.components.footer')
@endsection
