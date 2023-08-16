<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;

class HomeController extends Controller
{
    public function index(){
        $products = Product::where('status',1)->latest()->get();
        $latest_product = Product::where('status',1)->latest()->take(3)->get();
        $categories = Category::where('status',1)->latest()->get();
        return view ('website.home.index',compact('products','categories','latest_product'));
    }

    public function product_details($slug){
        $product = Product::where('slug',$slug)->firstOrFail();
        $category_id = $product->cat_id;
        $related_products = Product::where('cat_id',$category_id)->where('slug','!=',$slug)->latest()->get();
        return view('website.home.details',compact('product','related_products'));
    }
}
