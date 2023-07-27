<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use Stripe;

class CartController extends Controller
{
    public function cart_data()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();

            return view('cart', compact('cart'));
        } else {
            return redirect()->back();
        }
    }
    
    public function add_to_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart;

            $cart->user_id = $user->id;
            $cart->product_id = $product->id;
            $cart->image = $product->image;
            $cart->name = $product->name;
            $cart->price = $product->price;
            $cart->save();

            Alert::success('Product Added Successfully', 'We have added product to the cart');

            return redirect()->back();
        }
    }

    public function remove_to_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        Alert::warning('Product Remove Successfully');

        return redirect()->back();
    }

    public function cash_order()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $data = Cart::where('user_id', '=', $user_id)->get();

        foreach ($data as $data) {
            $order = new Order;

            $order->user_id = $user_id;
            $order->email = $user->email;

            $order->product_id = $data->product_id;
            $order->name = $data->name;
            $order->image = $data->image;
            $order->price = $data->price;

            $order->payment_status = 'Cash on delivery';
            $order->delivery_status = 'Processing...';

            $order->save();

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }

        Alert::success('We have Received Your Order. We Will connect with you soon...');
        return redirect()->back();
    }

    public function stripe($totalprice)
    {
        return view('stripe', compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "inr",
                "source" => $request->stripeToken,
                "description" => "Payment from mobile.com." 
        ]);


        $user = Auth::user();
        $user_id = $user->id;

        $data = Cart::where('user_id', '=', $user_id)->get();

        foreach ($data as $data) {
            $order = new Order;

            $order->user_id = $user_id;
            $order->email = $user->email;

            $order->product_id = $data->product_id;
            $order->name = $data->name;
            $order->image = $data->image;
            $order->price = $data->price;

            $order->payment_status = 'Pay using card';
            $order->delivery_status = 'Processing...';

            $order->save();

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    
    public function show_order_user(){
        if(Auth::id()){
            $user = Auth::user();
            $user_id = $user->id;

            $order = Order::where('user_id','=',$user_id)->get();

            return view('order', compact('order'));
        }
        else{
            return redirect()->back();
        }
    }

    public function cancle_order(Request $request, $id){
        $order = Order::find($id);

        $order->delivery_status = 'You cancled the order';

        $order->save();

        Alert::warning('Your order is cancle');

        return redirect()->back();
    }

}
