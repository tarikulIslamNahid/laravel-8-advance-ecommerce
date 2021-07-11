<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    public function index(){
        $coupons= coupon::latest()->get();
        return view('admin.coupon.index',compact('coupons'));

    }

    public function create(){
        return view('admin.coupon.create');
    }

    public function store(Request $request){
        $request->validate([
            'coupon_name' =>'sometimes|unique:coupons|max:255',
            'coupon_discount' =>'required',
            'coupon_validity' =>'required',
        ]);

        $coupon= new coupon;
        $coupon->coupon_name=strtoupper($request->coupon_name);
        $coupon->coupon_discount= $request->coupon_discount;
        $coupon->coupon_validity= $request->coupon_validity;
        $coupon->created_at= Carbon::now();
        $coupon->save();
	    $notification = array(
			'message' => 'Coupon Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('coupon.all')->with($notification);

    }

    public function delete($id){
        coupon::findOrFail($id)->delete();
        $dnotification=array(
            'message'=> 'Coupon Delete Sucessfully',
            'alert-type'=> 'error',
        );
        return redirect()->back()->with($dnotification);
    }
}
