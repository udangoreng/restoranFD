document.addEventListener('DOMContentLoaded', function () {
    let currentReservationId = null;
    let currentOrderId = null;

    function loadCart() {
        console.log('Loading cart data...');

        fetch('/cart/data', {
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => {
                console.log('Response status:', response.status);

                const contentType = response.headers.get("content-type");
                if (contentType && contentType.includes("application/json")) {
                    return response.json();
                } else {
                    throw new Error('Response is not JSON');
                }
            })
            .then(data => {
                console.log('Cart data received:', data);

                if (data.error) {
                    console.log('Error from server:', data.error);
                    showNoReservationPopup();
                    updateCartUI([], 0);
                    hideBackToReservationBtn();
                } else {
                    // Update UI
                    updateCartUI(data.cart || [], data.total || 0);

                    // Update tombol checkout
                    updateCheckoutButton(data.cart || [], data.is_valid_order);

                    // Tampilkan warning jika order tidak valid
                    if (!data.is_valid_order && data.missing_categories && data.missing_categories.length > 0) {
                        showOrderWarning(data.missing_categories);
                    }
                }
            });
    }

    function updateCheckoutButton(cartItems, isValidOrder = false) {
        const checkoutBtn = document.getElementById('checkoutBtn');
        if (!checkoutBtn) return;

        // Disable jika cart kosong ATAU order tidak valid
        if (cartItems.length === 0 || !isValidOrder) {
            checkoutBtn.disabled = true;

            // Tambah tooltip untuk info
            if (cartItems.length > 0 && !isValidOrder) {
                checkoutBtn.title = 'Please add at least 1 Appetizer, 1 Main Dish, and 1 Dessert';
            }
        } else {
            checkoutBtn.disabled = false;
            checkoutBtn.title = '';
        }
    }

    function showOrderWarning(missingCategories) {
        const container = document.getElementById('cartItemsContainer');
        if (!container) return;

        const warningHtml = `
        <div class="order-warning" style="
            background: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 8px;
            padding: 15px;
            margin: 10px auto;
            width: 90%;
            color: #856404;
        ">
            <strong><i class="fas fa-exclamation-triangle"></i> Minimum Order Required:</strong>
            <p>Please add at least 1 item from each category:</p>
            <ul style="margin-bottom: 0;">
                ${missingCategories.includes('appetizer') ? '<li>Appetizer</li>' : ''}
                ${missingCategories.includes('main dish') ? '<li>Main Dish</li>' : ''}
                ${missingCategories.includes('dessert') ? '<li>Dessert</li>' : ''}
            </ul>
        </div>
    `;

        // Tambah warning di atas cart items
        const existingWarning = container.querySelector('.order-warning');
        if (existingWarning) {
            existingWarning.remove();
        }

        container.insertAdjacentHTML('afterbegin', warningHtml);
    }

    function showBackToReservationBtn(reservationId) {
        const backBtn = document.getElementById('backToReservationBtn');
        if (!backBtn) {
            console.error('Back button element not found!');
            return;
        }

        console.log('Showing back button for reservation:', reservationId);

        backBtn.style.display = 'block';

        const newBackBtn = backBtn.cloneNode(true);
        backBtn.parentNode.replaceChild(newBackBtn, backBtn);

        const updatedBackBtn = document.getElementById('backToReservationBtn');

        updatedBackBtn.addEventListener('click', function (e) {
            e.preventDefault();
            console.log('Back button clicked! Reservation ID:', reservationId);

            if (reservationId) {
                window.location.href = `/reservation/${reservationId}`;
            } else {
                console.error('No reservation ID provided');
            }
        });
    }

    function hideBackToReservationBtn() {
        const backBtn = document.getElementById('backToReservationBtn');
        if (backBtn) {
            backBtn.style.display = 'none';
        }
    }

    function updateCheckoutButton(cartItems) {
        const checkoutBtn = document.getElementById('checkoutBtn');
        if (!checkoutBtn) return;

        if (cartItems.length > 0 && currentOrderId) {
            checkoutBtn.disabled = false;
            checkoutBtn.onclick = null;

            checkoutBtn.addEventListener('click', function () {
                console.log('Checkout clicked! Order ID:', currentOrderId);
                goToCheckout(currentOrderId);
            });
        } else {
            checkoutBtn.disabled = true;
        }
    }

    function goToCheckout(orderId) {
        if (orderId) {
            console.log('Redirecting to checkout for order:', orderId);
            window.location.href = `/checkout?order_id=${orderId}`;
        } else {
            console.error('No order ID for checkout');
        }
    }

    function updateCartUI(cartItems, total) {
        const container = document.getElementById('cartItemsContainer');
        const subtotalElement = document.getElementById('subtotalAmount');

        if (!container || !subtotalElement) {
            console.error('Cart container or subtotal element not found');
            return;
        }

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
                        <img src="${item.menu.img_path ? '/storage/' + item.menu.img_path : '/img/default.jpg'}" alt="${item.menu.name}">
                    </div>
                    <div class="item-details">
                        <div class="item-name">${item.menu.name}</div>
                        <div class="item-controls">
                            <button class="quantity-btn minus" data-cart-id="${item.id}" data-action="minus">-</button>
                            <div class="quantity">${item.quantity}</div>
                            <button class="quantity-btn plus" data-cart-id="${item.id}" data-action="plus">+</button>
                            <div class="item-price">IDR ${itemTotal.toLocaleString('id-ID')}</div>
                        </div>
                    </div>
                    <button class="trash-btn" data-cart-id="${item.id}" data-action="delete">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            `;
        });

        container.innerHTML = html;
        subtotalElement.textContent = 'IDR ' + total.toLocaleString('id-ID');
        attachCartItemEvents();
    }

    function attachCartItemEvents() {
        document.querySelectorAll('.quantity-btn[data-action="plus"], .quantity-btn[data-action="minus"]').forEach(btn => {
            btn.addEventListener('click', function () {
                const cartId = this.dataset.cartId;
                const action = this.dataset.action;
                const change = action === 'plus' ? 1 : -1;

                updateQuantity(cartId, change);
            });
        });
        document.querySelectorAll('.trash-btn[data-action="delete"]').forEach(btn => {
            btn.addEventListener('click', function () {
                const cartId = this.dataset.cartId;
                removeFromCart(cartId);
            });
        });
    }

    function updateQuantity(cartId, change) {
        console.log('Updating quantity for cart item:', cartId, 'change:', change);

        const quantityElement = document.querySelector(`[data-cart-id="${cartId}"] .quantity`);
        if (!quantityElement) {
            console.error('Quantity element not found for cart ID:', cartId);
            return;
        }

        let currentQty = parseInt(quantityElement.textContent);
        let newQty = currentQty + change;

        if (newQty < 1) newQty = 1;

        console.log('Current quantity:', currentQty, 'New quantity:', newQty);

        fetch(`/cart/update/${cartId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                quantity: newQty
            })
        })
            .then(response => {
                console.log('Update response status:', response.status);
                if (!response.ok) {
                    throw new Error('Update failed with status: ' + response.status);
                }
                return response.json();
            })
            .then(data => {
                console.log('Update successful:', data);
                loadCart();
            })
            .catch(error => {
                console.error('Error updating quantity:', error);
                showErrorPopup('Failed to update quantity: ' + error.message);
            });
    }

    function removeFromCart(cartId) {
        console.log('Removing cart item:', cartId);

        if (confirm('Hapus item dari keranjang?')) {
            fetch(`/cart/remove/${cartId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
                .then(response => {
                    console.log('Delete response status:', response.status);
                    if (!response.ok) {
                        throw new Error('Delete failed with status: ' + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Delete successful:', data);
                    loadCart();
                })
                .catch(error => {
                    console.error('Error removing item:', error);
                    showErrorPopup('Failed to remove item: ' + error.message);
                });
        }
    }

    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', function () {
            const menuId = this.dataset.menuId;
            console.log('Adding to cart, menu ID:', menuId);

            fetch('/order/addcart', {
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
            })
                .then(response => response.json())
                .then(data => {
                    console.log('Add to cart response:', data);
                    if (data.success) {
                        loadCart();
                        updateCartCount();
                        showSuccessPopup('Item added to cart!');
                    } else if (data.error) {
                        showNoReservationPopup();
                    }
                })
                .catch(error => {
                    console.error('Error adding to cart:', error);
                    showErrorPopup('Failed to add item to cart');
                });
        });
    });
    function showNoReservationPopup() {
        alert('Please Create A Reservation Before Ordering The Food');
    }

    function showSuccessPopup(message) {
        alert(message);
    }

    function showErrorPopup(message) {
        console.error('Error:', message);
        alert('Error: ' + message);
    }

    function updateCartCount() {
        fetch('/cart/data')
            .then(response => response.json())
            .then(data => {
                if (!data.error && data.cart) {
                    const totalItems = data.cart.reduce((sum, item) => sum + item.quantity, 0);
                    const cartCountElement = document.getElementById('cartCount');
                    if (cartCountElement) {
                        cartCountElement.textContent = totalItems;
                    }
                }
            })
            .catch(error => console.error('Error updating cart count:', error));
    }

    console.log('Cart system initialized');
    loadCart();
    updateCartCount();

    const orderModal = document.getElementById('orderModal');
    if (orderModal) {
        orderModal.addEventListener('show.bs.modal', function () {
            console.log('Order modal opened, reloading cart');
            loadCart();
        });
    }
});