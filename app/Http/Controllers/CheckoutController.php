<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Cart;

class CheckoutController extends Controller
{
    public function __construct() 
    {
      $this->middleware('auth');
    }
    
    public function index(){
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $subTotal = Cart::all()->where('user_ip',request()->ip())->sum
        (function($t){
            return $t->qty * $t->price;
        });
        return view('website.home.checkOut',compact('carts','subTotal'));
    }

}
