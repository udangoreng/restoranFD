class CartSystem {
    constructor() {
        this.currentReservationId = null;
        this.currentOrderId = null;
        this.isInitialized = false;

        this.init();
    }

    init() {
        if (this.isInitialized) return;

        this.loadCart();
        this.attachGlobalEvents();
        this.isInitialized = true;

        console.log('Cart system initialized');
    }

    attachGlobalEvents() {
        document.addEventListener('click', (e) => {
            if (e.target.closest('.add-to-cart-btn')) {
                this.handleAddToCart(e.target.closest('.add-to-cart-btn'));
            }

            if (e.target.closest('.quantity-btn')) {
                const btn = e.target.closest('.quantity-btn');
                this.handleQuantityChange(btn);
            }
            if (e.target.closest('.trash-btn')) {
                const btn = e.target.closest('.trash-btn');
                this.handleDeleteItem(btn);
            }
            if (e.target.id === 'checkoutBtn') {
                this.handleCheckout();
            }
        });

        const orderModal = document.getElementById('orderModal');
        if (orderModal) {
            orderModal.addEventListener('show.bs.modal', () => {
                this.loadCart();
            });
        }
    }

    async loadCart() {
        try {
            console.log('Loading cart data...');

            const response = await fetch('/cart/data', {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            if (!response.ok) throw new Error('Network response was not ok');

            const data = await response.json();
            console.log('Cart data:', data);

            this.updateCartUI(data.cart || [], data.total || 0);
            this.updateCartCount(data.cart || []);
            this.updateCheckoutButton(data);

            if (data.reservation_id) {
                this.currentReservationId = data.reservation_id;
                this.showBackToReservationBtn(data.reservation_id);
            }

            if (data.order_id) {
                this.currentOrderId = data.order_id;
            }

        } catch (error) {
            console.error('Error loading cart:', error);
            this.updateCartUI([], 0);
        }
    }

    updateCartUI(cartItems, total) {
        const container = document.getElementById('cartItemsContainer');
        const subtotalElement = document.getElementById('subtotalAmount');

        if (!container || !subtotalElement) return;

        if (!cartItems || cartItems.length === 0) {
            container.innerHTML = '<div class="text-center py-4"><p>You Don\'t Have Anything Here Yet</p></div>';
            subtotalElement.textContent = 'IDR 0';
            return;
        }

        let html = '';
        cartItems.forEach(item => {
            const itemTotal = item.price * item.quantity;
            html += `
                <div class="order-item" data-cart-id="${item.id}">
                    <div class="item-image">
                        <img src="${item.menu?.img_path ? '/storage/' + item.menu.img_path : '/img/default.jpg'}" alt="${item.menu?.name || 'Item'}">
                    </div>
                    <div class="item-details">
                        <div class="item-name">${item.menu?.name || 'Unknown Item'}</div>
                        <div class="item-controls">
                            <button class="quantity-btn minus" data-cart-id="${item.id}" data-action="minus">-</button>
                            <div class="quantity">${item.quantity}</div>
                            <button class="quantity-btn plus" data-cart-id="${item.id}" data-action="plus">+</button>
                            <div class="item-price">IDR ${itemTotal.toLocaleString('id-ID')}</div>
                        </div>
                    </div>
                    <button class="trash-btn" data-cart-id="${item.id}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            `;
        });

        container.innerHTML = html;
        subtotalElement.textContent = 'IDR ' + total.toLocaleString('id-ID');
    }

    updateCartCount(cartItems) {
        const cartCountElement = document.getElementById('cartCount');
        const floatingCart = document.getElementById('floatingCartBtn');

        if (!cartCountElement) return;

        const totalItems = cartItems.reduce((sum, item) => sum + item.quantity, 0);
        cartCountElement.textContent = totalItems;

        if (floatingCart) {
            floatingCart.style.visibility = totalItems > 0 ? 'visible' : 'hidden';
        }
    }

    updateCheckoutButton(data) {
        const checkoutBtn = document.getElementById('checkoutBtn');
        const warningElement = document.getElementById('orderWarning');

        if (!checkoutBtn) return;

        const hasItems = data.cart && data.cart.length > 0;
        const isValidOrder = data.is_valid_order !== false;
        const isDownpaymentPaid = data.is_downpayment_paid;

        if (warningElement) {
            if (!isValidOrder && hasItems) {
                warningElement.style.display = 'block';
                warningElement.innerHTML = `
                    <div class="alert alert-warning mt-2 mb-2">
                        <i class="fas fa-exclamation-triangle"></i>
                        Please add at least 1 Appetizer, 1 Main Dish, and 1 Dessert
                    </div>
                `;
            } else {
                warningElement.style.display = 'none';
                warningElement.innerHTML = '';
            }
        }
        checkoutBtn.disabled = !hasItems || !isValidOrder || isDownpaymentPaid;

        if (hasItems && isValidOrder && data.order_id) {
            checkoutBtn.onclick = () => {
                window.location.href = `/checkout?order_id=${data.order_id}`;
            };
        } else {
            checkoutBtn.onclick = null;
        }
    }

    async handleAddToCart(button) {
        const menuId = button.dataset.menuId;

        try {
            const response = await fetch('/order/addcart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    menu_id: menuId,
                    quantity: 1
                })
            });

            const data = await response.json();

            if (data.success) {
                this.loadCart();
                this.showPopup('Item added to cart!', 'success');
            } else if (data.error) {
                this.showPopup('Please create a reservation before ordering', 'warning');
            }
        } catch (error) {
            console.error('Error adding to cart:', error);
            this.showPopup('Failed to add item to cart', 'error');
        }
    }

    async handleQuantityChange(button) {
        const cartId = button.dataset.cartId;
        const action = button.dataset.action;
        const quantityElement = button.parentElement.querySelector('.quantity');

        if (!quantityElement || !cartId) return;

        let currentQty = parseInt(quantityElement.textContent);
        let newQty = action === 'plus' ? currentQty + 1 : currentQty - 1;

        if (newQty < 1) newQty = 1;

        try {
            const response = await fetch(`/cart/update/${cartId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                    'X-HTTP-Method-Override': 'PUT'
                },
                body: JSON.stringify({
                    quantity: newQty,
                    _method: 'PUT'
                })
            });

            if (response.ok) {
                this.loadCart();
            } else {
                const errorData = await response.json();
                console.error('Update failed:', errorData);
                this.showPopup('Failed to update quantity', 'error');
            }
        } catch (error) {
            console.error('Error updating quantity:', error);
            this.showPopup('Network error. Please try again.', 'error');
        }
    }

    async handleDeleteItem(button) {
        const cartId = button.dataset.cartId;

        if (!confirm('Remove item from cart?')) return;

        try {
            const response = await fetch(`/cart/remove/${cartId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                this.loadCart();
            }
        } catch (error) {
            console.error('Error removing item:', error);
        }
    }

    handleCheckout() {
        if (this.currentOrderId) {
            window.location.href = `/checkout?order_id=${this.currentOrderId}`;
        } else {
            this.showPopup('Please complete your order first', 'warning');
        }
    }

    showBackToReservationBtn(reservationId) {
        const backBtn = document.getElementById('backToReservationBtn');
        if (!backBtn || !reservationId) return;

        backBtn.style.display = 'block';
        backBtn.onclick = () => {
            window.location.href = `/reservation/${reservationId}`;
        };
    }

    showPopup(message, type = 'info') {
        alert(message);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    window.cartSystem = new CartSystem();
});