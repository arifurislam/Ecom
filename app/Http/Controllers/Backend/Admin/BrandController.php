<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::paginate(6);
        return view('backend.admin.brand.index',compact('brands'));
    }

    public function create()
    {
        return view('backend.admin.brand.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:brands',
        ],[
            'name.required' => 'Plz Enter Your Brand name',
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->status = (boolean)$request->status;
        $brand->save();
        Toastr::success('New Brand has been added to our records', 'Success');
        return redirect()->back();
    }

    public function show(Brand $brand)
    {
        //
    }

    public function edit(Brand $brand)
    {
        return view('backend.admin.brand.edit',compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'name' => 'required|max:255' ,
        ],[
            'name.required' => 'Plz Enter Your Brand name',
        ]);

        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->status = (boolean)$request->status;
        $brand->save();
        Toastr::success('Brand Info has been updated', 'Success');
        return redirect('admin/brands');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        Toastr::success('Brand Successfully deleted', 'Success');
        return redirect()->back();
    }
}
