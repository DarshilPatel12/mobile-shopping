<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function show_order(){
        $order = Order::all();

        return view('admin.order', compact('order'));
    }

    public function delivered($id){
        $order = Order::find($id);
        $order->payment_status = "Paid";
        $order->delivery_status = "Delivered";
        $order->save();

        Alert::success('Order Delivered');
        return redirect()->back();
    }
}
