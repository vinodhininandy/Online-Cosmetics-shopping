<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }

    public function success()
    {
        return view('order-success');
    }
}
