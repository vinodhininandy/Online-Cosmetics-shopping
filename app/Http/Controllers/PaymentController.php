<?php

namespace App\Http\Controllers;

use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\CheckoutDetailsMail; // Import your Mailable class
use App\Models\Order; // Import Order model if not already imported

class PaymentController extends Controller
{
    private $razorpayId = 'rzp_test_Pr8rSFGW98gREc';
    private $razorpayKey = 'TbCND115hHFYccP3eEztltTZ';
 
    // Method to show payment form
    public function showPaymentForm()
    {
        $totalPrice = $this->getCartTotal(); // Fetch total amount from the cart

        // Check if cart is empty
        if ($totalPrice == 0) {
            return redirect()->route('user.products.index')->with('error', 'Your cart is empty.');
        }

        return view('payment', compact('totalPrice'));
    }

    // Method to submit payment
    public function submitPayment(Request $request)
    {
        // Validate form data
        $request->validate([
            'payment_method' => 'required',
            'card_number' => 'required_if:payment_method,card_payment',
            'expiry_date' => 'required_if:payment_method,card_payment',
            'cvv' => 'required_if:payment_method,card_payment',
            'email' => 'required|email', // Add validation for email
        ]);

        $paymentMethod = $request->input('payment_method');
        $totalPrice = $this->getCartTotal(); // Fetch total amount from the cart

        // Check if cart is empty
        if ($totalPrice == 0) {
            return redirect()->route('user.products.index')->with('error', 'Your cart is empty.');
        }

        $email = $request->input('email'); // Get email from the form
        $employee = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ];

        try {
            if ($paymentMethod === 'online_payment') {
                $api = new Api($this->razorpayId, $this->razorpayKey);
                
                // Order creation
                $order = $api->order->create([
                    'amount' => $totalPrice * 100, // amount in the smallest currency unit (e.g., paise for INR)
                    'currency' => 'INR',
                    'payment_capture' => 1 // auto capture
                ]);

                $orderId = $order['id'];

                // Redirect to Razorpay payment page
                return view('razorpay_checkout', compact('orderId', 'totalPrice'));
            }

            // Simulated success message for card payment and cash on delivery
            $message = 'Order placed successfully!';

            // Optionally, store order details in the database
            Order::create([
                'amount' => $totalPrice,
                'payment_method' => $paymentMethod,
                'status' => 'success'
            ]);

            // Send email with checkout details
            Mail::to($email)->send(new CheckoutDetailsMail($totalPrice, $employee, Session::get('cart')));

            // Redirect to the success page with the success message
            return redirect()->route('payment_success')->with('success_message', $message);
        } catch (\Exception $e) {
            Log::error('Payment failed: '.$e->getMessage());
            return redirect()->route('user.products.index')->with('error', 'Payment failed. Please try again.');
        }
    }

    // Method to show success page
    public function showSuccessPage()
    {
        return view('payment_success');
    }

    // Method to get cart total from session or database
    private function getCartTotal()
    {
        // Example: Retrieve cart total from session
        $cart = Session::get('cart');
        $totalPrice = 0;

        if ($cart) {
            foreach ($cart as $item) {
                $totalPrice += $item['price'] * $item['quantity'];
            }
        }

        return $totalPrice;
    }
}
