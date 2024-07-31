<!-- resources/views/checkout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
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
            background-color: #007bff;
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

        .btn-confirm {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: block;
            margin: 20px auto;
        }

        .btn-confirm:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<div class="container">
        <h1>Checkout</h1>
        <div class="customer-info">
            <h3>Customer Information</h3>
            <p><strong>Name:</strong> {{ $employee->name }}</p>
            <p><strong>Email:</strong> {{ $employee->email }}</p>
            <p><strong>Phone:</strong> {{ $employee->phone }}</p>
            <p><strong>Address:</strong> {{ $employee->address }}</p>
        </div>
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
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    <tr>
                        <td>
                            <div class="product-info">
                                <img src="{{ asset('storage/images/' . $details['image']) }}" width="50" height="50" class="img-responsive"/>
                                <span>{{ $details['name'] }}</span>
                            </div>
                        </td>
                        <td>{{ $details['quantity'] }}</td>
                        <td>₹{{ $details['price'] }}</td>
                        <td>₹{{ $details['price'] * $details['quantity'] }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" style="text-align: center;">Your cart is empty.</td>
                </tr>
            @endif
        </tbody>
    </table>

    @if(session('cart'))
        <div class="total-container">
            <span>Total</span>
            <span>₹{{ array_sum(array_map(function($detail) { return $detail['price'] * $detail['quantity']; }, session('cart'))) }}</span>
        </div>
        <button class="btn-confirm" onclick="redirectToPayment()">Proceed to Payment</button>
    @endif
   
</div>

<script>
    function redirectToPayment() {
        const totalPrice = {{ array_sum(array_map(function($detail) { return $detail['price'] * $detail['quantity']; }, session('cart'))) }};
        window.location.href = '{{ route('payment.form') }}?total=' + totalPrice;
    }
</script>

</body>
</html>
