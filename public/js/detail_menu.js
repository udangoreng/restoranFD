let cart = JSON.parse(localStorage.getItem("cart")) || [];

function saveCart() {
    localStorage.setItem("cart", JSON.stringify(cart));
}

function updateCartCount() {
    const total = cart.reduce((sum, item) => sum + item.quantity, 0);
    document.getElementById("cartCount").innerText = total;
}

updateCartCount();

document.querySelectorAll(".add-to-cart-btn").forEach(btn => {
    btn.addEventListener("click", function () {

        const name = this.dataset.name;
        const price = parseInt(this.dataset.price);
        const image = this.dataset.image;

        const existing = cart.find(item => item.name === name);

        if (existing) {
            existing.quantity++;
        } else {
            cart.push({
                name,
                price,
                image,
                quantity: 1
            });
        }

        saveCart();
        updateCartCount();

        alert(`${name} added to order!`);
    });
});

document.getElementById("floatingCartBtn")
    .addEventListener("click", function () {
        document.getElementById("orderPopup").classList.add("show");
    });
