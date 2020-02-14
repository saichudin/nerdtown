<?php

namespace App\Http\Controllers;


use App\Http\Requests\CheckoutRequest;
use Konekt\Address\Models\Country;
use Vanilo\Cart\Contracts\CartManager;
use Vanilo\Checkout\CheckoutManager;
use Vanilo\Order\Contracts\OrderFactory;

final class CheckoutController extends Controller
{
    private $checkout;

    private $cart;

    public function __construct(CheckoutManager $checkout, CartManager $cart)
    {
        $this->checkout = $checkout;
        $this->cart     = $cart;
    }

    public function show()
    {
        $checkout = false;

        if ($this->cart->isNotEmpty()) {
            $checkout = $this->checkout;
            if ($old = old()) {
                $checkout->update($old);
            }

            $checkout->setCart($this->cart);
        }

        return view('checkout.show', [
            'checkout'  => $checkout,
            'countries' => Country::all()
        ]);
    }

    public function submit(CheckoutRequest $request, OrderFactory $orderFactory)
    {
        $this->checkout->update($request->all());
        $this->checkout->setCustomAttribute('notes', $request->get('notes'));
        $this->checkout->setCart($this->cart);

        $order = $orderFactory->createFromCheckout($this->checkout);
        $this->cart->destroy();

        return view('checkout.thankyou', ['order' => $order]);
    }
}
