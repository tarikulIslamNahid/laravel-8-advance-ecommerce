<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
   public function index(){
    return view('frontend.home.index');
   }
   public function loginpage(){
    if(auth()->check()){
        return redirect('/');
      }else{

          return view('frontend.auth.login');

      }

   }
}
