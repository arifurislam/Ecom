<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    public function adToWishlist($id){
        if(Auth::check()){
            Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $id,
        ]);
            Session::flash('success','Successfully Added To Your Wishlist');
            return redirect()->back();

        }
        else{
            Session::flash('error','You need to log in 1st');
            return redirect('login');
        }

    }
    public function index(){
        $wishlists = Wishlist::where('user_id',Auth::id())->latest()->get();
        return view('website.home.wishlist',compact('wishlists'));
    }
    public function destroy($id){
        $destroy = Wishlist::where('id',$id)->delete();
        Session::flash('success','Successfully Deleted From Wish List');
        return redirect()->back();
    }
}
