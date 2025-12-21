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
