<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background-color: #101111;
            color: #fff;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .product-info {
            display: flex;
            align-items: center;
        }

        .product-info img {
            margin-right: 10px;
            border-radius: 5px;
        }

        .btn-danger, .btn-update, .btn-checkout {
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-update {
            background-color: #28a745;
        }
        .btn-checkout {
            background-color: #090909;
            color: white; /* Optional: For better contrast */
            padding: 10px 20px; /* Optional: Adjust padding as needed */
            border: none; /* Optional: Remove border */
            cursor: pointer; 
        }
       
        .btn-update:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Your Cart</h1>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    <tr>
                        <td>
                            <div class="product-info">
                                <img src="{{ asset('storage/images/' . $details['image']) }}" width="50" height="50" class="img-responsive"/>
                                <span>{{ $details['name'] }}</span>
                            </div>
                        </td>
                        <td>
                            <input type="number" value="{{ $details['quantity'] }}" min="1" id="quantity-{{ $id }}" onchange="updateTotal({{ $id }}, {{ $details['price'] }})">
                        </td>
                        <td>₹{{ $details['price'] }}</td>
                        <td id="total-{{ $id }}">₹{{ $details['price'] * $details['quantity'] }}</td>
                        <td>
                            <button class="btn-update" onclick="updateCart('{{ route('user.cart.update') }}', {{ $id }}, {{ $details['price'] }})">Update</button>
                            <button class="btn-danger" onclick="removeFromCart('{{ route('user.cart.remove') }}', {{ $id }})">Remove</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" style="text-align: center;">Your cart is empty.</td>
                </tr>
            @endif

        </tbody>
    </table>
    @if(session('cart'))
        <div class="total-container">
            <span>Total</span>
            <span>₹{{ array_sum(array_map(function($detail) { return $detail['price'] * $detail['quantity']; }, session('cart'))) }}</span>
        </div>
        <button class="btn-checkout" onclick="checkout()">Checkout</button>
    @endif
   
</div>
   
</div>
<script>
    function removeFromCart(route, productId) {
        fetch(route, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ product_id: productId })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.success) {
                alert(data.success);
                location.reload();
            } else {
                alert('Error: ' + data.error);
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function updateCart(route, productId, productPrice) {
        const quantity = document.getElementById(`quantity-${productId}`).value;
        fetch(route, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: quantity
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.success) {
                alert(data.success);
                // Update the total price without reloading the page
                const totalElement = document.getElementById(`total-${productId}`);
                totalElement.textContent = '$' + (productPrice * quantity).toFixed(2);
            } else {
                alert('Error: ' + data.error);
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function updateTotal(productId, productPrice) {
        const quantity = document.getElementById(`quantity-${productId}`).value;
        const totalElement = document.getElementById(`total-${productId}`);
        totalElement.textContent = '$' + (productPrice * quantity).toFixed(2);
    }
    function checkout() {
        
        window.location.href = 'http://127.0.0.1:8000/employees/create';
    }
</script>
</body>
</html>
