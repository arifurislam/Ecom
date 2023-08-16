<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\Admin\Cart;
use Illuminate\Support\Str;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShippingController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'contact' => 'required|string',
            'address' => 'required|string|max:200',
            'state' => 'required|string',
            'zipcode' => 'required|string',
        ],[
            'first_name.required'    => 'Plz enter your First Name here...',
            'last_name.required'    => 'Plz enter your First Name here...',
            'email.required'    => 'Plz enter your email address here...',
            'contact.required'    => 'Plz enter your contact number here...',
            'address.required'    => 'Plz enter your address here...',
            'state.required'    => 'Plz enter your state here...',
            'zipcode.required'    => 'Plz enter your zipcode here...',
        ]);

        $prefix = "BOT-";
        $rand_id = $prefix.rand(0000,9999);

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'invoice_no' =>$rand_id,
            'payment_type' => $request->payment,
            'total' => $request->total,
            'sub_total' => $request->subtotal,
            'coupon_discount' => $request->coupon_discount,
            'created_at' => Carbon::now(),
        ]);

        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        foreach($carts as $cart){
        OrderDetails::insert([
            'order_id' => $order_id,
            'product_id' => $cart->product_id,
            'product_qty' => $cart->qty,
            'created_at' => Carbon::now(),
        ]);
    }

        Shipping::insert([
            'order_id'     =>  $order_id,
            'first_name'   =>  $request->first_name,
            'last_name'    =>  $request->last_name,
            'email'        =>  $request->email,
            'phone'        =>  $request->contact,
            'address'      =>  $request->address,
            'state'        =>  $request->state,
            'zipcode'      =>  $request->zipcode,
            'created_at'   =>  Carbon::now(),
        ]);
        if(Session::has('coupon')){
            session()->forget('coupon');
        }
        Cart::where('user_ip', request()->ip())->delete();
        return redirect('/post/checkout')->with('success','Successfully Your order placed now');
        // Session::flash('success','Successfully Your order placed now');
    }

    public function postCheckout(){
        return view('website.home.postOrder');
    }
}
