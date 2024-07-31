<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Details</title>
</head>
<body>
    <h1>Checkout Details</h1>
    
    <h3>Customer Information</h3>
    <p><strong>Name:</strong> {{ $employee['name'] }}</p>
    <p><strong>Email:</strong> {{ $employee['email'] }}</p>
    <p><strong>Phone:</strong> {{ $employee['phone'] }}</p>
    <p><strong>Address:</strong> {{ $employee['address'] }}</p>

    <h3>Order Summary</h3>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>₹{{ $item['price'] }}</td>
                    <td>₹{{ $item['price'] * $item['quantity'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Total: ₹{{ $totalPrice }}</h3>
</body>
</html>
