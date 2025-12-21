@extends('layout.index')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/cancelPopup.css') }}">
@endsection
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
                        <div class="reservation-label">Reservation Code</div>
                        <div class="reservation-value">{{ $reservation->reservation_code }}</div>
                    </div>

                    <div class="reservation-card-row">
                        <div class="reservation-label">Full Name</div>
                        <div class="reservation-value">{{ $reservation->first_name . ' ' . $reservation->last_name }}</div>
                    </div>

                    <div class="reservation-card-row">
                        <div class="reservation-label">Phone</div>
                        <div class="reservation-value">{{ $reservation->phone }}</div>
                    </div>

                    <div class="reservation-card-row">
                        <div class="reservation-label">Guests</div>
                        <div class="reservation-value">{{ $reservation->person_attending }} Persons</div>
                    </div>

                    <div class="reservation-card-row">
                        <div class="reservation-label">Date</div>
                        <div class="reservation-value">
                            {{ \Carbon\Carbon::parse($reservation->booking_date)->format('j F Y') }}</div>
                    </div>

                    <div class="reservation-card-row">
                        <div class="reservation-label">Time</div>
                        <div class="reservation-value">{{ \Carbon\Carbon::parse($reservation->time_in)->format('H:i A') }}
                        </div>
                    </div>

                    <div class="reservation-card-row">
                        <div class="reservation-label">Status</div>
                        <div class="reservation-value">
                            <span class="reservation-badge reservation-badge-confirmed">{{ $reservation->status }}</span>
                        </div>
                    </div>
                </div>

                <div class="reservation-card reservation-requests">
                    <h3 class="reservation-card-title">Special Request</h3>
                    <ul class="reservation-requests-list">
                        <li>{{ $reservation->request }}</li>
                    </ul>
                </div>

                <div class="reservation-card reservation-message">
                    <h3 class="reservation-card-title">Message from You</h3>
                    <p class="reservation-message-text">{{ $reservation->message }}</p>
                </div>

            </div>

            <div class="reservation-right">

                <div class="reservation-card reservation-order">
                    <h3 class="reservation-card-title">Ordered Menu</h3>
                    @if (!isset($reservation->orders))
                        <p class="reservation-value">
                            You Haven't Had Any Menu Ordered. <a href={{ route('order.menu', $reservation->id) }}>Order
                                Some
                                Menu?</a>
                        </p>
                    @else
                        @foreach ($reservation->orders as $items)
                            <table class="reservation-menu-table" aria-label="Ordered menu">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th class="reservation-qty">Qty</th>
                                        <th class="reservation-price">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items->carts as $item)
                                        <tr>
                                            <td class="menu-name">{{ $item->menu->name }}</td>
                                            <td class="reservation-qty">{{ $item->quantity }}</td>
                                            <td class="reservation-price">@currency($item->price)</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="reservation-summary">
                                <div class="summary-row"><span>Subtotal</span><span>@currency($items->total_amount)</span></div>
                                <div class="summary-row"><span>Tax (10%)</span><span>@currency($items->total_amount * 0.1)</span></div>
                                <div class="summary-row summary-total"><span>Total</span><span>@currency($items->total_amount + $items->total_amount * 0.1)</span>
                                </div>
                            </div>
                        @endforeach
                </div>

                <div class="reservation-actions">
                    <button class="reservation-btn reservation-btn-primary"
                        {{ $reservation->status == 'Created' || $reservation->status == 'Pending Payment' ? 'disabled' : '' }}>Download
                        Invoice (PDF)</button>
                    <div class="reservation-actions-row">
                        <button class="reservation-btn reservation-btn-outline">Modify Menu</button>
                        <button class="reservation-btn reservation-btn-cancel">Cancel Reservation</button>
                    </div>
                </div>
                @endif

            </div>

        </div>
    </section>
    @if (session('success'))
        @include('layout.popup.success_reservation_popup')
        <script src="{{ asset('js/Popup.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const modal = document.getElementById("loginInfoModal");
                modal.style.display = "flex";
            });
            const understoodBtn = document.getElementById('closeLoginInfoModal');
            understoodBtn.addEventListener('click', function() {
                modal.style.display = "none";
            });
        </script>
    @endif

    @include('layout.components.footer')

    {{-- <div id="popupContainer"></div> --}}
@endsection

@section('script')
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

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/cancel.js') }}"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
@endsection
