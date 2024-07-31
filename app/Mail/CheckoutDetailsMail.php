<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CheckoutDetailsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $totalPrice;
    public $employee;
    public $cart;

    /**
     * Create a new message instance.
     *
     * @param int $totalPrice
     * @param array $employee
     * @param array $cart
     * @return void
     */
    public function __construct($totalPrice, $employee, $cart)
    {
        $this->totalPrice = $totalPrice;
        $this->employee = $employee;
        $this->cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.checkout_details')
                    ->subject('Your Checkout Details')
                    ->with([
                        'totalPrice' => $this->totalPrice,
                        'employee' => $this->employee,
                        'cart' => $this->cart
                    ]);
    }
}
