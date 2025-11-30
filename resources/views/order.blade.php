<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-dark {
            background: #18312E;
            border: 2px solid #c89b3c;
            color: #c89b3c;
            font-weight: 600;
            padding: 10px 20px;
        }

        .btn-dark:hover {
            background: #c89b3c;
            color: #18312E;
            border-color: #18312E;
        }

        .modal-content {
            background: linear-gradient(135deg, #18312E 0%, #2a4d48 100%);
            border-radius: 10px;
            border: 2px solid #c89b3c;
        }
        .order-header {
            text-align: center;
            width: 100%;
            font-size: 20px;
            font-weight: 600;
            color: #c89b3c;
        }
        .divider {
            width: 90%;
            height: 2px;
            background: linear-gradient(90deg, transparent 0%, #c89b3c 50%, transparent 100%);
            margin: 10px auto 20px;
        }
        .btn-close {
            filter: invert(1);
        }
        .order-item {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid #c89b3c;
            border-radius: 8px;
            padding: 15px;
            margin: 10px auto;
            width: 90%;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .item-image {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            border: 2px solid #c89b3c;
            overflow: hidden;
            background: #18312E;
        }
        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .item-details {
            flex: 1;
        }
        .item-name {
            font-weight: 600;
            color: #18312E;
            margin-bottom: 5px;
        }
        .item-controls {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 5px;
        }
        .quantity-btn {
            width: 25px;
            height: 25px;
            border: 1px solid #c89b3c;
            background: #18312E;
            color: #c89b3c;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-weight: bold;
        }
        .quantity {
            color: #18312E;
            font-weight: 600;
            min-width: 20px;
            text-align: center;
        }
        .item-price {
            color: #18312E;
            font-weight: 600;
        }
        .edit-btn {
            background: #c89b3c;
            border: 1px solid #18312E;
            color: #18312E;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }
        .summary-section {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid #c89b3c;
            border-radius: 8px;
            padding: 15px;
            margin: 15px auto;
            width: 90%;
        }
        .subtotal {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #18312E;
            font-weight: 600;
            font-size: 16px;
        }
        .checkout-btn {
            background: #c89b3c;
            border: 2px solid #18312E;
            color: #18312E;
            font-weight: 600;
            padding: 12px 30px;
            font-size: 18px;
            border-radius: 8px;
            width: 100%;
            transition: all 0.3s ease;
            margin-top: 10px;
        }
        .checkout-btn:hover {
            background: #18312E;
            color: #c89b3c;
            border-color: #c89b3c;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<button class="btn btn-dark m-3" data-bs-toggle="modal" data-bs-target="#orderModal">
    View Order
</button>
<div class="modal fade" id="orderModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <div class="order-header">View Order</div>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="divider"></div>
            <div class="order-item" data-base-price="159">
                <div class="item-image">
                      <img src="{{ asset('img/lasagna.jpeg') }}" alt="icon lasagna" width="20">
                </div>
                <div class="item-details">
                    <div class="item-name">Lasagna</div>
                    <div class="item-controls">
                        <div class="quantity-btn">-</div>
                        <div class="quantity">1</div>
                        <div class="quantity-btn">+</div>
                        <div class="item-price">Rp. 159k</div>
                    </div>
                </div>
                <button class="edit-btn">Edit</button>
            </div>

            <div class="order-item" data-base-price="99">
                <div class="item-image">
                     <img src="{{ asset('img/pavlova.jpeg') }}" alt="icon pavlova" width="20">
                </div>
                <div class="item-details">
                    <div class="item-name">Pavlova</div>
                    <div class="item-controls">
                        <div class="quantity-btn">-</div>
                        <div class="quantity">1</div>
                        <div class="quantity-btn">+</div>
                        <div class="item-price">Rp. 99k</div>
                    </div>
                </div>
                <button class="edit-btn">Edit</button>
            </div>

            <div class="order-item" data-base-price="170">
                <div class="item-image">
                     <img src="{{ asset('img/lobstertortelini.jpeg') }}" alt="icon lobstertortellini" width="20">
                </div>
                <div class="item-details">
                    <div class="item-name">Lobster Tortellini</div>
                    <div class="item-controls">
                        <div class="quantity-btn">-</div>
                        <div class="quantity">1</div>
                        <div class="quantity-btn">+</div>
                        <div class="item-price">Rp. 170k</div>
                    </div>
                </div>
                <button class="edit-btn">Edit</button>
            </div>

            <div class="summary-section">
                <div class="subtotal">
                    <span>Subtotal</span>
                    <span id="subtotalAmount">Rp. 428k</span>
                </div>
                <button class="checkout-btn">Checkout</button>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const quantityBtns = document.querySelectorAll('.quantity-btn');
        
        quantityBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const orderItem = this.closest('.order-item');
                const itemControls = this.closest('.item-controls');
                const quantityElement = itemControls.querySelector('.quantity');
                let quantity = parseInt(quantityElement.textContent);
                const basePrice = parseInt(orderItem.getAttribute('data-base-price'));
                
                if (this.textContent === '+') {
                    quantity++;
                } else if (this.textContent === '-' && quantity > 1) {
                    quantity--;
                }
                
                quantityElement.textContent = quantity;
                const priceElement = itemControls.querySelector('.item-price');
                const newPrice = basePrice * quantity;
                priceElement.textContent = `Rp. ${newPrice}k`;
                updateSubtotal();
            });
        });
        
        function updateSubtotal() {
            const prices = document.querySelectorAll('.item-price');
            let subtotal = 0;
            
            prices.forEach(price => {
                const priceValue = parseInt(price.textContent.replace('Rp. ', '').replace('k', ''));
                subtotal += priceValue;
            });
            
            const subtotalElement = document.getElementById('subtotalAmount');
            subtotalElement.textContent = `Rp. ${subtotal}k`;
        }
        updateSubtotal();
    });
</script>

</body>
</html>