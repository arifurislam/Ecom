<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Cart;
use App\Models\Admin\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function adToCart(Request $request, $id){

        $checkCart = Cart::where('product_id', $id)->where('user_ip',request()->ip())->first();

        if($checkCart){
          $cart_increment =  Cart::where('product_id', $id)->increment('qty');

          if($cart_increment){
            Session::flash('success','Successfully added to Cart');
            return redirect()->back();
        }
        }
        else{
            $store = Cart::insert([
                'product_id' => $id,
                'qty' => 1,
                'price' => $request->price,
                'user_ip' => request()->ip(),
                'created_at'=> carbon::now(),
            ]);
            if($store){
                Session::flash('success','Successfully added to Cart');
                return redirect()->back();
            }else{
                Session::flash('error','value');
                return redirect()->back();
            }
        }

    }

    public function cart(){
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $subTotal = Cart::all()->where('user_ip',request()->ip())->sum
        (function($t){
            return $t->qty * $t->price;
        });
        return view('website.home.cart',compact('carts','subTotal'));
    }

    public function delete($id){
        $destroy = Cart::where('id',$id)->where('user_ip',request()->ip())->delete();
        Session::flash('success','Successfully Product has been removed from cart');
        return redirect()->back();
    }

    public function update(Request $request,$id){
        $update = Cart::where('id',$id)->where('user_ip',request()->ip())->update([
            'qty' => $request->qty,
        ]);
        if($update){
        Session::flash('success','Cart has been upadated');
        return redirect()->back();
        }
    }

    public function applyCoupon(Request $request){
        $check = Coupon::where('name',$request->coupon)->first();
        if($check){
            $subTotal = Cart::all()->where('user_ip',request()->ip())->sum
                (function($t){
                return $t->qty * $t->price;
            });
            Session::put('coupon',[
                'name' => $check->name,
                'discount' => $check->discount,
                'discount_amount' => ($subTotal * $check->discount) / 100,
            ]);
            Session::flash('success','Successfully Coupon Submited');
            return redirect()->back();
        }
        else{
            Session::flash('error','Invalid Coupon Code');
            return redirect()->back();
        }
    }

    public function CouponDestroy(){
        if(Session::has('coupon')){
            session()->forget('coupon');
        }
        Session::flash('success','Successfully Removed Your Coupon');
        return redirect()->back();
    }
}
