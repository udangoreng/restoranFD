document.addEventListener('DOMContentLoaded', function() {
    function loadCart() {
        fetch('/cart/data')
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    showNoReservationPopup();
                    return;
                }
                
                updateCartUI(data.cart, data.total);
            });
    }
    
    function updateCartUI(cartItems, total) {
        const container = document.getElementById('cartItemsContainer');
        const subtotalElement = document.getElementById('subtotalAmount');
        const checkoutBtn = document.getElementById('checkoutBtn');
        
        if (cartItems.length === 0) {
            container.innerHTML = '<div class="text-center py-4"><p>Keranjang kosong</p></div>';
            subtotalElement.textContent = 'IDR 0';
            checkoutBtn.disabled = true;
            return;
        }
        
        let html = '';
        let subtotal = 0;
        
        cartItems.forEach(item => {
            const itemTotal = item.price * item.quantity;
            subtotal += itemTotal;
            
            html += `
                <div class="order-item" data-cart-id="${item.id}">
                    <div class="item-image">
                        <img src="${item.menu.img_path ? '/storage/' + item.menu.img_path : '/img/default.jpg'}" alt="${item.menu.name}">
                    </div>
                    <div class="item-details">
                        <div class="item-name">${item.menu.name}</div>
                        <div class="item-controls">
                            <button class="quantity-btn minus" onclick="updateQuantity(${item.id}, -1)">-</button>
                            <div class="quantity">${item.quantity}</div>
                            <button class="quantity-btn plus" onclick="updateQuantity(${item.id}, 1)">+</button>
                            <div class="item-price">IDR ${itemTotal.toLocaleString('id-ID')}</div>
                        </div>
                    </div>
                    <button class="trash-btn" onclick="removeFromCart(${item.id})">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            `;
        });
        
        container.innerHTML = html;
        subtotalElement.textContent = 'IDR ' + total.toLocaleString('id-ID');
        checkoutBtn.disabled = false;
    }
    
    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', function() {
            const menuId = this.dataset.menuId;
            fetch('/order/addcart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    menu_id: menuId,
                    quantity: 1
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    loadCart();
                    updateCartCount();
                } else if (data.error) {
                    showNoReservationPopup();
                }
            });
        });
    });
    
    window.updateQuantity = function(cartId, change) {
        const quantityElement = document.querySelector(`[data-cart-id="${cartId}"] .quantity`);
        let currentQty = parseInt(quantityElement.textContent);
        let newQty = currentQty + change;
        
        if (newQty < 1) newQty = 1;
        
        fetch(`/cart/update/${cartId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                quantity: newQty
            })
        })
        .then(() => loadCart());
    };
    
    window.removeFromCart = function(cartId) {
        if (confirm('Hapus item dari keranjang?')) {
            fetch(`/cart/remove/${cartId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(() => loadCart());
        }
    };
    
    function showNoReservationPopup() {
        alert('Please Create A Reservation Before Ordering The Food');
    }
    
    function updateCartCount() {
        fetch('/cart/data')
            .then(response => response.json())
            .then(data => {
                if (!data.error && data.cart) {
                    const totalItems = data.cart.reduce((sum, item) => sum + item.quantity, 0);
                    document.getElementById('cartCount').textContent = totalItems;
                }
            });
    }
    
    loadCart();
    updateCartCount();
    
    const orderModal = document.getElementById('orderModal');
    if (orderModal) {
        orderModal.addEventListener('show.bs.modal', function() {
            loadCart();
        });
    }
});