<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(Request $request)
    {
        return view('cart.cart');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cartItems = session()->get('cartItems', []);
            
        // Check if the product is already in the cart
        if(isset($cartItems[$id])) {
            // Check if the current quantity is less than or equal to the stock
            if ($cartItems[$id]['quantity'] < $product->stock) {
            $cartItems[$id]['quantity']++;
            }
            else {
                return redirect()->back()->with('error', 'Not enough stock available for this product.');
            }
        } else {
            // Add new item to the cart if it does not exist
            $cartItems[$id] = [
                "image_path" => $product->image_path,
                "name" => $product->name,
                "brand" => $product->brand,
                "details" => $product->details,
                "price" => $product->price,
                "stock" => $product->stock,
                "quantity" => 1
            ];
        }
        // Update the cart session with the new item or updated quantity
        session()->put('cartItems', $cartItems);
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function delete(Request $request)
    {
        if($request->id) {
            $cartItems = session()->get('cartItems');

            if(isset($cartItems[$request->id])) {
                unset($cartItems[$request->id]); 
                session()->put('cartItems', $cartItems);
            }

            return redirect()->back()->with('success', 'Product deleted successfully');
        }
    }

    public function update(Request $request)
    {
        // Ensure the product ID and quantity are provided
        if($request->id && $request->quantity){
            $product = Product::find($request->id);
            
            // Check if the product exists and if the requested quantity is less than or equal to the stock
            if($product && $request->quantity <= $product->stock){
            $cartItems = session()->get('cartItems');
            $cartItems[$request->id]["quantity"] = $request->quantity;
            session()->put('cartItems', $cartItems);
            return redirect()->back()->with('success', 'Product quantity updated in cart!');
            }else {
                // Error message if the quantity exceeds stock
                return redirect()->back()->with('error', 'Requested quantity exceeds available stock.');
            }
        }

        return redirect()->back()->with('error', 'Invalid request.');
    }
}
