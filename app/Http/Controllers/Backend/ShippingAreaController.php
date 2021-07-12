<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\district;
use App\Models\ship_division;
use App\Models\State;
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

       // ajax  get District By Division dependencies
       public function getDistrict($division_id){

        $getDistrict= district::where('division_id',$division_id)->get();
        return json_encode($getDistrict);

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

          $district= new district;
          $district->district_name= $request->district_name;
          $district->division_id= $request->division_id;
          $district->created_at= Carbon::now();
          $district->save();
          $notification = array(
              'message' => 'District Created Successfully',
              'alert-type' => 'success'
          );

          return redirect()->back()->with($notification);

    }

    // edit show district
    public function DistrictEdit($id){
        $districts= district::find($id);
        $divisions= ship_division::latest()->get();

        return view('admin.District.edit',compact('divisions','districts'));

     }


     public function DistrictUpdate(Request $request,$id){


        $request->validate([
            'district_name' =>'required|max:255',
            'division_id' =>'required',

          ]);

          $district= district::find($id);
          $district->district_name= $request->district_name;
          $district->division_id= $request->division_id;
          $district->created_at= Carbon::now();
          $district->update();
          $notification = array(
              'message' => 'District Updated Successfully',
              'alert-type' => 'success'
          );

          return redirect()->route('district.all')->with($notification);

    }



    public function DistrictDelete($id){
        district::find($id)->delete();
        $notification = array(
            'message' => 'District Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

       }



        //------------------------------------ State Area --------------------------------
        public function StateIndex(){
        $divisions= ship_division::latest()->get();
        $districts= district::latest()->get();
        $states= State::latest()->get();
        return view('admin.state.index',compact('divisions','districts','states'));
    }


    public function StateStore(Request $request){
        $request->validate([
            'division_id' =>'required',
            'district_id' =>'required',
            'state_name' =>'required|unique:states|max:255',

        ]);

        $state= new State;
        $state->division_id= $request->division_id;
        $state->district_id= $request->district_id;
        $state->state_name= $request->state_name;
        $state->created_at= Carbon::now();
        $state->save();
        $notification = array(
            'message' => 'State Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        }


            // edit show district
    public function StateEdit($id){
        $state= State::find($id);
        $divisions= ship_division::latest()->get();
        $districts= district::where('division_id',$state->division_id)->get();

        return view('admin.state.edit',compact('divisions','districts','state'));

     }


     public function StateUpdate(Request $request,$id){
        $request->validate([
            'division_id' =>'required',
            'district_id' =>'required',
            'state_name' =>'required',

        ]);

        $state= State::find($id);
        $state->division_id= $request->division_id;
        $state->district_id= $request->district_id;
        $state->state_name= $request->state_name;
        $state->updated_at= Carbon::now();
        $state->save();
        $notification = array(
            'message' => 'State Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('state.all')->with($notification);

        }

        public function StateDelete($id){
            State::find($id)->delete();
            $notification = array(
                'message' => 'State Delete Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

           }

}
