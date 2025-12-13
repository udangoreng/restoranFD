<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
            font-size: 20px;
            font-weight: 600;
            color: #c89b3c;
            width: 100%;
        }

        .divider {
            width: 90%;
            height: 2px;
            background: linear-gradient(90deg, transparent 0%, #c89b3c 50%, transparent 100%);
            margin: 10px auto 20px;
        }

        .btn-close { filter: invert(1); }

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

        .item-details { flex: 1; }

        .item-name {
            font-weight: 600;
            color: #18312E;
            margin-bottom: 5px;
        }

        .item-controls {
            display: flex;
            align-items: center;
            gap: 10px;
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

        .trash-btn {
            background: #c89b3c;
            border: 1px solid #18312E;
            color: #18312E;
            padding: 8px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
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
            font-weight: 600;
            font-size: 16px;
            color: #18312E;
        }

        .checkout-btn {
            background: #c89b3c;
            border: 2px solid #18312E;
            color: #18312E;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 8px;
            width: 100%;
            transition: 0.3s ease;
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

<button class="btn btn-dark m-3" data-bs-toggle="modal" data-bs-target="#orderModal">View Order</button>

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
                   <img src="{{ asset('img/appetizer1.jpg') }}" alt="">
                </div>
                <div class="item-details">
                    <div class="item-name">Peach Bruschetta</div>
                    <div class="item-controls">
                        <div class="quantity-btn">-</div>
                        <div class="quantity">1</div>
                        <div class="quantity-btn">+</div>
                        <div class="item-price">IDR 140.000</div>
                    </div>
                </div>
                <button class="trash-btn"><i class="fa-solid fa-trash"></i></button>
            </div>

            <div class="order-item" data-base-price="99">
                <div class="item-image">
                    <img src="{{ asset('img/maindish1.jpg') }}" alt="maindish1">
                </div>
                <div class="item-details">
                    <div class="item-name">Herb Roasted Salmon</div>
                    <div class="item-controls">
                        <div class="quantity-btn">-</div>
                        <div class="quantity">1</div>
                        <div class="quantity-btn">+</div>
                        <div class="item-price">IDR 185.000</div>
                    </div>
                </div>
                <button class="trash-btn"><i class="fa-solid fa-trash"></i></button>
            </div>

            <div class="order-item" data-base-price="170">
                <div class="item-image">
                   <img src="{{ asset('img/best1.jpeg') }}" alt="maindish1">
                </div>
                <div class="item-details">
                    <div class="item-name">Lobster Tortellini</div>
                    <div class="item-controls">
                        <div class="quantity-btn">-</div>
                        <div class="quantity">1</div>
                        <div class="quantity-btn">+</div>
                        <div class="item-price">IDR 320.000</div>
                    </div>
                </div>
                <button class="trash-btn"><i class="fa-solid fa-trash"></i></button>
            </div>

            <div class="order-item" data-base-price="170">
                <div class="item-image">
                   <img src="{{ asset('img/dessert4.jpg') }}" alt="">
                </div>
                <div class="item-details">
                    <div class="item-name">Caramel Pannacotta</div>
                    <div class="item-controls">
                        <div class="quantity-btn">-</div>
                        <div class="quantity">1</div>
                        <div class="quantity-btn">+</div>
                        <div class="item-price">IDR 105.000</div>
                    </div>
                </div>
                <button class="trash-btn"><i class="fa-solid fa-trash"></i></button>
            </div>

            <div class="order-item" data-base-price="170">
                <div class="item-image">
                    <img src="{{ asset('img/mocktail.jpg') }}" alt="">
                </div>
                <div class="item-details">
                    <div class="item-name">Lychee Rose Mocktail</div>
                    <div class="item-controls">
                        <div class="quantity-btn">-</div>
                        <div class="quantity">2</div>
                        <div class="quantity-btn">+</div>
                        <div class="item-price">IDR 146.000</div>
                    </div>
                </div>
                <button class="trash-btn"><i class="fa-solid fa-trash"></i></button>
            </div>

            <div class="order-item" data-base-price="170">
                <div class="item-image">
                   <img src="{{ asset('img/berry.jpg') }}" alt="">
                </div>
                <div class="item-details">
                    <div class="item-name">Strawberry Smoothie</div>
                    <div class="item-controls">
                        <div class="quantity-btn">-</div>
                        <div class="quantity">1</div>
                        <div class="quantity-btn">+</div>
                        <div class="item-price">IDR 55.000</div>
                    </div>
                </div>
                <button class="trash-btn"><i class="fa-solid fa-trash"></i></button>
            </div>

            <div class="summary-section">
                <div class="subtotal">
                    <span>Subtotal</span>
                    <span id="subtotalAmount">IDR 951.000</span>
                </div>
                <button class="checkout-btn">Checkout</button>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const quantityBtns = document.querySelectorAll('.quantity-btn');

    quantityBtns.forEach(btn => {
        btn.addEventListener('click', function () {

            const item = this.closest('.order-item');
            const quantity = item.querySelector('.quantity');
            let qty = parseInt(quantity.textContent);
            const basePrice = parseInt(item.dataset.basePrice);

            if (this.textContent === '+') qty++;
            else if (this.textContent === '-' && qty > 1) qty--;

            quantity.textContent = qty;
            item.querySelector('.item-price').textContent = `IDR ${basePrice * qty}.000`;

            updateSubtotal();
        });
    });

    function updateSubtotal() {
        let subtotal = 0;
        document.querySelectorAll('.item-price').forEach(p => {
            subtotal += parseInt(p.textContent.replace('IDR ', '').replace('.000', ''));
        });
        document.getElementById('subtotalAmount').textContent = `IDR ${subtotal}.000`;
    }

    updateSubtotal();
});
</script>

</body>
</html>
