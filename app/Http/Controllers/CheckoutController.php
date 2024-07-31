<?php
// app/Http/Controllers/CheckoutController.php

namespace App\Http\Controllers;

use App\Mail\CheckoutDetailsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $employee = auth()->user(); // Assuming the employee is the authenticated user
        return view('checkout', compact('employee'));
    }

    public function proceedToPayment(Request $request)
    {
        $employee = auth()->user(); // Assuming the employee is the authenticated user
        $cart = session('cart');
        $totalPrice = array_sum(array_map(function($detail) { return $detail['price'] * $detail['quantity']; }, session('cart')));
        session(['total_price' => $totalPrice]);
        // Send the checkout details email
        Mail::to($employee->email)->send(new CheckoutDetailsMail($employee, $cart));

        // Redirect to the payment form
        return redirect()->route('payment.form');
    }
   

}
