<?php
namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('user.products.index', compact('products'));
    }

    public function show($id)
{
    $product = Product::find($id);

    if (!$product) {
        return redirect()->route('user.products.index')->with('error', 'Product not found');
    }

    return view('user.products.show', compact('product'));
}

}
?>  