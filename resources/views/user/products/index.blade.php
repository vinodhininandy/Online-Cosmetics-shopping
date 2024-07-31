<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .header {
        background-color: #0d0e0e;
        color: white;
        padding: 10px 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .header h1 {
        flex-grow: 1;
        text-align: center;
        margin: 0;
    }

    .header-icons {
        position: absolute;
        right: 20px;
        display: flex;
        align-items: center;
    }

    .header-icons a {
        margin-left: 15px;
        position: relative;
    }

    .cart-icon .bi, .logout-icon .bi {
        font-size: 30px;
        color: white;
        cursor: pointer;
    }

    .cart-count {
        position: absolute;
        top: -5px;
        right: -10px;
        background-color: red;
        color: white;
        border-radius: 50%;
        padding: 2px 6px;
        font-size: 12px;
    }

    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 0 20px;
    }

    .product-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    .product-card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
    }

    .product-image img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
    }

    .product-details {
        text-align: center;
    }

    .product-details h3 {
        margin: 0;
        margin-bottom: 10px;
        font-size: 18px;
    }

    .product-details p {
        margin: 0;
        margin-bottom: 5px;
        font-size: 14px;
    }

    .add-to-cart-btn {
        background-color: #000;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 8px 16px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-top: 20px;
    }

    .add-to-cart-btn:hover {
        background-color: #0056b3;
    }

    .quantity {
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin-top: 10px;
    }

    .quantity button {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        cursor: pointer;
    }

    .quantity span {
        font-size: 16px;
    }

    .cart-button {
        margin-left: auto;
    }
</style>
</head>
<body>
<div class="header">
    <h1>Product List</h1>
    <div class="header-icons">
        <a href="{{ route('user.cart.index') }}" class="cart-icon">
            <i class="bi bi-bag-fill"></i>
            <span class="cart-count">{{ session('cart') ? count(session('cart')) : 0 }}</span>
        </a>
        <a href="#" class="logout-icon" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right"></i>
        </a>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

<div class="container">
    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif
    <div class="product-container">
        @foreach($products as $product)
            <div class="product-card">
                <div class="product-image">
                <a href="{{ route('user.products.show', $product->id) }}">
                    @if($product->image)
                        <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}">
                    @endif
                </div>
                <div class="product-details">
                    <h3><a href="{{ route('user.products.show', $product->id) }}">{{ $product->name }}</a></h3>
                    <p><strong>Price:</strong> ₹<span id="price_{{ $product->id }}">{{ $product->price }}</span></p>
                    <p><strong>Brand:</strong> {{ $product->brand }}</p>
                    <p class="product-description"><strong>Description:</strong> {{ $product->description }}</p>
                   
                </div>
                
            </div>
        @endforeach
    </div>
</div>

<script>
    function addToCart(route, productId) {
        const quantity = document.getElementById('quantity_' + productId).innerText;
        fetch(route, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ product_id: productId, quantity: quantity })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success message
                alert(data.success);
                
                // Update cart count
                const cartCountElement = document.querySelector('.cart-count');
                let cartCount = parseInt(cartCountElement.innerText);
                cartCount += parseInt(quantity);
                cartCountElement.innerText = cartCount;
            } else {
                // Handle error
                alert(data.error);
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function increaseQuantity(button) {
        const productId = button.getAttribute('data-product-id');
        const quantityElement = document.getElementById('quantity_' + productId);
        let quantity = parseInt(quantityElement.innerText);
        quantity++;
        quantityElement.innerText = quantity;

        updateTotalPrice(productId, quantity);
    }

    function decreaseQuantity(button) {
        const productId = button.getAttribute('data-product-id');
        const quantityElement = document.getElementById('quantity_' + productId);
        let quantity = parseInt(quantityElement.innerText);
        if (quantity > 1) {
            quantity--;
            quantityElement.innerText = quantity;

            updateTotalPrice(productId, quantity);
        }
    }

    function updateTotalPrice(productId, quantity) {
        const priceElement = document.getElementById('price_' + productId);
        const totalPriceElement = document.getElementById('total_price_' + productId);
        const price = parseFloat(priceElement.innerText);
        const totalPrice = price * quantity;
        totalPriceElement.innerText = totalPrice.toFixed(2);
    }
</script>

</body>
</html>
