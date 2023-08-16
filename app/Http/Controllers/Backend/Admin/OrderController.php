<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Order;
use App\Models\Shipping;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::latest()->get();
        return view('backend.order.index',compact('orders'));
    }
    public function show($order_id){
        $order = Order::findOrFail($order_id);
        $orderDetails = OrderDetails::where('order_id',$order_id)->get();
        $shipping = Shipping::where('order_id',$order_id)->first();
        // return $shipping;
        return view('backend.order.show',compact('order','orderDetails','shipping'));
    }
}
