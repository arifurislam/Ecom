<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class CouponController extends Controller
{

    public function index()
    {
        $coupons = Coupon::paginate(6);
        return view('backend.admin.coupon.index',compact('coupons'));
    }


    public function create()
    {
        return view('backend.admin.coupon.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:coupons',
        ],[
            'name.required' => 'Plz Enter Your Coupon name',
        ]);

        $coupon = new Coupon();
        $coupon->name = $request->name;
        $coupon->discount = $request->discount;
        $coupon->slug = Str::slug($request->name);
        $coupon->status = (boolean)$request->status;
        $coupon->save();
        Toastr::success('New Coupon has been added to our records', 'Success');
        return redirect()->back();
    }

 
    public function edit(Coupon $coupon)
    {
        return view('backend.admin.coupon.edit',compact('coupon'));
    }

    public function update(Request $request, Coupon $coupon)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ],[
            'name.required' => 'Plz Enter Your Coupon name',
        ]);

        $coupon->name = $request->name;
        $coupon->discount = $request->discount;
        $coupon->slug = Str::slug($request->name);
        $coupon->status = (boolean)$request->status;
        $coupon->save();
        Toastr::success('New Coupon has been Updated', 'Success');
        return redirect('admin/coupons');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        Toastr::success('Coupon has been deleted', 'Success');
        return redirect()->back();
    }
}
