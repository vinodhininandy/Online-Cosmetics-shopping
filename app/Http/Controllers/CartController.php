<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('user.cart.index', compact('cart'));
    }

    public function addToCart(Request $request) {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
    
        // Fetch the product from the database
        $product = Product::find($productId);
    
        if(!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found.']);
        }
    
        // Add product to the cart (assuming you have a Cart model or similar logic)
        $cart = session()->get('cart', []);
        if(isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
    
        session()->put('cart', $cart);
    
        return response()->json(['success' => 'Product added to cart successfully!']);
    }
    
    public function remove(Request $request, $id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('user.cart.index')->with('success', 'Product removed successfully');
    }
    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $productId = $request->product_id;
        $quantity = $request->quantity;

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            session()->put('cart', $cart);
            return response()->json(['success' => 'Cart updated successfully.']);
        }

        return response()->json(['error' => 'Product not found in cart.'], 404);
    }
    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $productId = $request->product_id;

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            return response()->json(['success' => 'Product removed from cart.']);
        }
        
        return response()->json(['error' => 'Product not found in cart.'], 404);
    }
    public function showCheckout()
    {
        // Assuming you have an Employee model and you are fetching an employee from the database
        $employee = Employee::find(1); // Replace 1 with the appropriate employee ID or logic to get the employee

        return view('checkout', ['employee' => $employee]);
    }
}