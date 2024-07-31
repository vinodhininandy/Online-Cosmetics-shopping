<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include Bootstrap CSS and Bootstrap Icons -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo {
            /* Your logo styles here */
        }

        .header-icons {
            display: flex;
            align-items: center;
        }

        .header-icons a {
            margin-left: 15px;
            position: relative;
        }

        .cart-icon i, .logout-icon i {
            font-size: 30px;
            color: black;
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
            max-width: 800px;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .details {
            margin-top: 20px;
            padding: 10px;
            background-color: #e9ecef;
            border-radius: 5px;
        }

        .details input[type="number"] {
            width: 60px;
            padding: 5px;
        }

        .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease;
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

    </style>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="header">
    <div class="logo">
        <!-- Your logo here -->
    </div>
    <div class="header-icons">
        <a href="{{ route('user.cart.index') }}" class="cart-icon">
            <i class="bi bi-cart-fill"></i>
            <span class="cart-count">{{ session('cart') ? count(session('cart')) : 0 }}</span>
        </a>
        <a href="#" class="logout-icon" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>

<div class="container">
    <h1>{{ $product->name }}</h1>
    <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" style="width: 300px; height: auto;">
    <p><strong>Price:</strong> ₹<span id="price_{{ $product->id }}">{{ $product->price }}</span></p>
    <p><strong>Brand:</strong> {{ $product->brand }}</p>
    <p class="product-description"><strong>Description:</strong> {{ $product->description }}</p>
    <div class="quantity">
        <button onclick="decreaseQuantity(this)" data-product-id="{{ $product->id }}">-</button>
        <span id="quantity_{{ $product->id }}">1</span>
        <button onclick="increaseQuantity(this)" data-product-id="{{ $product->id }}">+</button>
    </div>
    <div>
    <button class="add-to-cart-btn" onclick="addToCart('{{ route('user.cart.add') }}', {{ $product->id }})">Add to Cart</button>
    </div>
</div>

<a href="{{ route('user.products.index') }}">Back to Products</a>
@endsection

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
                alert(data.success);
                const cartCountElement = document.querySelector('.cart-count');
                let cartCount = parseInt(cartCountElement.innerText);
                cartCount += parseInt(quantity);
                cartCountElement.innerText = cartCount;
            } else {
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

       
