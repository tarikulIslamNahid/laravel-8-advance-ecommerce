<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
   public function logout(){
    Auth::logout();
    return redirect()->route('login');
   }
   public function resetpass(){
    return view('frontend.auth.forgot');

   }
}
