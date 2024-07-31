<?php

namespace App\Services;

class CartService
{
    public function getCartItems()
    {
        return session()->get('cart', []);
    }

    public function removeProductFromCart($productId)
    {
        $cart = session()->get('cart', []);
        if (array_key_exists($productId, $cart)) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            return true;
        }
        return false;
    }

    public function addProductToCart($product)
    {
        $cart = session()->get('cart', []);
        if (!array_key_exists($product->id, $cart)) {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->prod_name,
                'price' => $product->price,
                'brand' => $product->brand,
                'description' => $product->description,
                'product_image' => $product->product_image,
            ];
        }
        session()->put('cart', $cart);
    }
}
