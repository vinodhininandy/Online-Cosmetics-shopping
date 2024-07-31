<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
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
        h2 {
            margin-bottom: 20px;
        }
        .payment-method {
            margin-bottom: 15px;
        }
        .payment-method label {
            margin-left: 8px;
        }
        .form-group {
            display: none;
            margin-bottom: 15px;
        }
        .form-group.show {
            display: block;
        }
        .submit-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        .submit-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Select Payment Method</h2>
        <form id="paymentForm">
            <div class="payment-method">
                <input type="radio" id="cod" name="payment_method" value="cash_on_delivery" required>
                <label for="cod">Cash on Delivery</label>
            </div>
            <div class="payment-method">
                <input type="radio" id="card" name="payment_method" value="card_payment">
                <label for="card">Card Payment</label>
                <div id="cardDetails" class="form-group">
                    <input type="text" id="cardNumber" name="card_number" placeholder="Card Number"><br>
                    <input type="text" id="expiryDate" name="expiry_date" placeholder="Expiry Date"><br>
                    <input type="text" id="cvv" name="cvv" placeholder="CVV"><br>
                </div>
            </div>
            <div class="payment-method">
                <input type="radio" id="online" name="payment_method" value="online_payment">
                <label for="online">Online Payment</label>
                
            </div>
            <button type="button" class="submit-button" onclick="proceedToPay()">Proceed to Pay</button>
        </form>
        <div class="error-message" id="errorMessage" style="display:none;"></div>
    </div>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            const cardRadio = document.getElementById('card');
            const onlineRadio = document.getElementById('online');
            const codRadio = document.getElementById('cod');
            const cardDetails = document.getElementById('cardDetails');
            const upiDetails = document.getElementById('upiDetails');

            cardRadio.addEventListener('change', function() {
                if (this.checked) {
                    cardDetails.classList.add('show');
                    upiDetails.classList.remove('show');
                    enableRequired(cardDetails);
                    disableRequired(upiDetails);
                }
            });

            onlineRadio.addEventListener('change', function() {
                if (this.checked) {
                    upiDetails.classList.add('show');
                    cardDetails.classList.remove('show');
                    enableRequired(upiDetails);
                    disableRequired(cardDetails);
                }
            });

            codRadio.addEventListener('change', function() {
                if (this.checked) {
                    cardDetails.classList.remove('show');
                    upiDetails.classList.remove('show');
                    disableRequired(cardDetails);
                    disableRequired(upiDetails);
                }
            });

            function enableRequired(group) {
                group.querySelectorAll('input').forEach(function(input) {
                    input.required = true;
                });
            }

            function disableRequired(group) {
                group.querySelectorAll('input').forEach(function(input) {
                    input.required = false;
                });
            }
        });

        function proceedToPay() {
            const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
            if (paymentMethod === 'online_payment') {
                var options = {
                    "key": "rzp_test_Pr8rSFGW98gREc", // Enter the Key ID generated from the Dashboard
                    "amount": {{ $totalPrice * 100 }}, // Amount is in currency subunits. Default currency is INR. Hence, 1000 paise = INR 10
                    "currency": "INR",
                    "name": "Rare Beauty",
                    "description": "Test Transaction",
                    "image": "https://example.com/your_logo",
                    "order_id": "", // Pass the order ID if you have generated one
                    "handler": function (response){
                        alert("Payment successful. Payment ID: " + response.razorpay_payment_id);
                        // Redirect to the success page or handle success logic
                       
                    },
                    "prefill": {
                        "name": "Gaurav Kumar",
                        "email": "gaurav.kumar@example.com",
                        "contact": "9999999999"
                    },
                    "notes": {
                        "address": "Razorpay Corporate Office"
                    },
                    "theme": {
                        "color": "#F37254"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            } else {
                window.location.href = "{{ route('payment.success') }}";
            }
        }
    </script>
</body>
</html>
