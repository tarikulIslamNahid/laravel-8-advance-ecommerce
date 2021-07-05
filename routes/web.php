<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Frontend\IndexController;

Route::get('/',[IndexController::class,'index'])->name('home');
Route::get('/register',function(){
    return redirect()->route('login');
})->name('register');

Route::get('/login',[IndexController::class,'loginpage'])->name('login');

Route::get('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
    Route::redirect('/', '/admin/login');

});
Route::prefix('admin/profile')->group(function (){
    Route::get('/',[ProfileController::class,'index'])->name('profile.view');

    Route::get('/edit',[ProfileController::class,'edit'])->name('profile.edit');
    Route::post('/update',[ProfileController::class,'update'])->name('profile.update');
    Route::get('/password/edit',[ProfileController::class,'passedit'])->name('profile.reset');
    Route::post('/password/update',[ProfileController::class,'passupdate'])->name('profile.passupdate');
});


Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.dashboard.index');
})->name('admin.dashboard');



Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
