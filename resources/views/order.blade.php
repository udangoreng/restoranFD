<div class="modal fade" id="orderModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header border-0">
                <div class="order-header">View Order</div>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="divider"></div>

            <div id="cartItemsContainer">
                <div class="text-center py-4">
                    <p>You Don't Have Anything Here Yet</p>
                </div>
            </div>

            <div class="summary-section">
                <div class="subtotal">
                    <span>Subtotal</span>
                    <span id="subtotalAmount">IDR 0</span>
                </div>
                <button class="checkout-btn mb-2" id="checkoutBtn" disabled>Checkout</button>
                <button class="checkout-btn" id="backToReservationBtn" style="display: none;">
                    Back To Reservation
                </button>

        </div>
    </div>
</div>
