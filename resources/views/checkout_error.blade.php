{{-- resources/views/checkout_error.blade.php --}}
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
                Your table awaits
                <span class="reservation-gold-text">We unfortunately unable to book you a table</span>
            </p>
        </div>
    </section>
    
    <main style="min-height: 70vh; display: flex; align-items: center; justify-content: center;">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="checkout-box">
                        <h1 class="page-title mb-4">Payment Failed</h1>
                        
                        <div class="mb-4">
                            <i class="fas fa-times-circle" style="font-size: 80px; color: #dc3545;"></i>
                        </div>
                        
                        <h3 class="mb-3">Oops! Something Went Wrong</h3>
                        
                        <p class="mb-4">
                            Your payment was not successful. Please try again.
                        </p>
                        
                        <div class="mt-4">
                            <a href="{{ url()->previous() }}" class="checkout-btn" style="display: inline-block; width: auto; padding: 12px 30px; background: #dc3545;">
                                Try Again
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    @include('layout.components.footer')
@endsection