<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Admin\Category;
use App\Models\Admin\Brand;
use Carbon\Carbon;
use Storage;
use Image;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.admin.product.create',compact('categories','brands'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cat_id'     => 'required|max:255|integer',
            'brand_id'   => 'required|max:255|integer',
            'name'       => 'required|max:255|string',
            'code'       => 'required|max:255|string|unique:products',
            'qty'        => 'required|max:255|integer',
            'short_des'  => 'required|max:255|string',
            'long_des'   => 'required',
            'price'      => 'required|integer',
            'media1'     => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'media2'     => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'media3'     => 'required|image|mimes:jpg,png,jpeg,gif,svg',

        ],[
            'cat_id.integer' => 'Plz select Category',
            'brand_id.integer' => 'Plz select Brand',
        ]);

        $slug = Str::slug($request->name);
        if($request->hasFile('media1')){
            $image1 = $request->file('media1');
            $imageName1 = $slug  .'-'.  Carbon::now()->toDateString(). uniqid() . '.' . $image1->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('product'))
            {
                Storage::disk('public')->makeDirectory('product');
            }

            Image::make($image1)->resize(270, 270)->save(base_path('public/storage/product/'.$imageName1));
        }

        if($request->hasFile('media2')){
            $image2 = $request->file('media2');
            $imageName2 = $slug  .'-'.  Carbon::now()->toDateString(). uniqid() . '.' . $image2->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('product'))
            {
                Storage::disk('public')->makeDirectory('product');
            }

            Image::make($image2)->resize(270, 270)->save(base_path('public/storage/product/'.$imageName2));
        }

        if($request->hasFile('media3')){
            $image3 = $request->file('media3');
            $imageName3 = $slug  .'-'.  Carbon::now()->toDateString(). uniqid() . '.' . $image3->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('product'))
            {
                Storage::disk('public')->makeDirectory('product');
            }

            Image::make($image3)->resize(270, 270)->save(base_path('public/storage/product/'.$imageName3));
        }

        $product = new Product ();
        $product->cat_id    = $request->cat_id;
        $product->brand_id  = $request->brand_id;
        $product->name      = $request->name;
        $product->slug      = $slug;
        $product->code      = $request->code;
        $product->quantity  = $request->qty;
        $product->short_des = $request->short_des;
        $product->long_des  = $request->long_des;
        $product->price     = $request->price;
        $product->media1    = $imageName1;
        $product->media2    = $imageName2;
        $product->media3    = $imageName3;
        $product->status    = (boolean)$request->status;
        $product->save();
        Toastr::success('New product has been added', 'Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // return view('backend.admin.product.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
