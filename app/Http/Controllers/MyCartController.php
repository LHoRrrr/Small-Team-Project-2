<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slideshow;
use Illuminate\Http\Request;
use LDAP\Result;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class MyCartController extends Controller
{
    public function cart(){
        $slideshow = Slideshow::all();
        return view('cart',compact('slideshow'));
    }
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
    
        // If product is already in cart, just increase quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Else, add new product to cart
            $cart[$id] = [
                'pname' => $product->pname,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
            ];
        }
    
        session()->put('cart', $cart);
    
        return redirect()->back()->with('success', 'Product added to cart.');
    }

  public function updateCart(Request $request)
{
    info('UpdateCart Request Data:', $request->all());

    $cart = session('cart');

    if (isset($cart[$request->product_id])) {
        if($request->type == 'update'){
            $cart[$request->product_id]['quantity'] = (int) $request->quantity;
        }else{
            unset($cart[$request->product_id]);
        }

        session()->put('cart', $cart);

        // Pass updated cart to the view
        $view = view('includes.CartItem', ['cart' => $cart])->render();

        return response()->json([
            'success' => true,
            'message' => 'Quantity updated',
            'html' => $view
        ]);
    }

    return response()->json([
        'success' => false,
        'message' => 'Product not found in cart'
    ], 404);
}

   
}
