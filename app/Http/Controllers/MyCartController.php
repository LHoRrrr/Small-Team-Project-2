<?php

namespace App\Http\Controllers;

use App\Models\Order;
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

public function order(Request $request)
    {
        // Create a new order for the authenticated user
        $order = Order::create([
            "user_id" => auth()->user()->id
        ]);

        $amount = 0;

        // Iterate through cart items in session
        foreach (session('cart') as $key => $value) {
            // Create an order-product relationship entry
            $order->products()->create([
                "product_id" => $key,
                "quantity" => $value['quantity'],
                "price" => $value['price']
            ]);

            // Correct amount calculation
            $amount += $value['quantity'] * $value['price'];
        }

        // Save total amount to the order
        $order->amount = $amount;

        // Correct method: use ->save() not -save()
        $order->save();
        // Show the final order object
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $successURL = route('order.success') .'?session_id= {CHECKOUT_SESSION_ID}&order_id=' . $order->id ;
        $response = $stripe->checkout->sessions->create([
        'success_url' => $successURL,
        'customer_email' => auth()->user()->email,
        'line_items' => [
            [
            'price_data' => [
                "product_data" => [
                    "name" => "shping",
                ],
                "unit_amount" => 100 * $amount,
                "currency" => "USD"
            ],
            'quantity' => 1,
            ],
        ],
        'mode' => 'payment',
        ]);
        return redirect($response['url']);
    }

    public function orderSuccess(Request $request){
        //dd($request->all());
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $session = $stripe->checkout->sessions->retrieve($request->session_id);
        if($session->status == "complete"){
            $order = Order::find($request->order_id);
            $order->status = 1;
            $order->strip_id = $session->id;
            $order->save();
            return redirect()->route('home')->with("success", "Order Placed!");
        }
            $order = Order::find($request->order_id);
            $order->status = 2;
            $order->save();
        dd('Fail');
    }
 
}
