<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\district;
use App\Models\ship_division;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShippingAreaController extends Controller
{

    //------------------------------------ Divisions Area --------------------------------
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

public function DivisionEdit($id){
   $divisions= ship_division::find($id);
   return view('admin.division.edit',compact('divisions'));

}
public function DivisionUpdate(Request $request,$id){
    $request->validate([
        'division_name' =>'required|max:255',

      ]);

      $coupon= ship_division::find($id);
      $coupon->division_name= $request->division_name;
      $coupon->updated_at= Carbon::now();
      $coupon->update();
      $notification = array(
          'message' => 'Division Updated Successfully',
          'alert-type' => 'success'
      );

      return redirect()->route('division.all')->with($notification);

}

   public function DivisionDelete($id){
    ship_division::find($id)->delete();
    $notification = array(
        'message' => 'Division Delete Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

   }



       //------------------------------------ District Area --------------------------------
       public function DistrictIndex(){
        $divisions= ship_division::latest()->get();
        $districts= district::latest()->get();
        return view('admin.District.index',compact('divisions','districts'));
    }

    public function DistrictStore(Request $request){


        $request->validate([
            'district_name' =>'required|unique:districts|max:255',
            'division_id' =>'required',

          ]);

          $coupon= new district;
          $coupon->district_name= $request->district_name;
          $coupon->division_id= $request->division_id;
          $coupon->created_at= Carbon::now();
          $coupon->save();
          $notification = array(
              'message' => 'District Created Successfully',
              'alert-type' => 'success'
          );

          return redirect()->back()->with($notification);

    }

    public function DistrictDelete($id){
        district::find($id)->delete();
        $notification = array(
            'message' => 'District Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

       }

}
