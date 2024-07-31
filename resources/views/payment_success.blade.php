<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .success-message {
            margin-top: 20px;
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        @if (session('success_message'))
            <div class="success-message">
                {{ session('success_message') }}
            </div>
        @else
            <div class="success-message">
                Your Order is successfully Placed.
            </div>
        @endif
    </div>
</body>
</html>