<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ship_division;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShippingAreaController extends Controller
{
   public function DivisionIndex(){
       $divisions= ship_division::latest()->get();
       return view('admin.division.index',compact('divisions'));
   }
   public function DivisionStore(Request $request){
    $request->validate([
      'division_name' =>'required|unique:ship_divisions|max:255',

    ]);

    $coupon= new ship_division;
    $coupon->division_name= $request->division_name;
    $coupon->created_at= Carbon::now();
    $coupon->save();
    $notification = array(
        'message' => 'Division Created Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

   }

}
