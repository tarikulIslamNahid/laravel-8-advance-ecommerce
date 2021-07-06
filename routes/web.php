<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Frontend\IndexController;

Route::get('/',[IndexController::class,'index'])->name('home');
Route::get('user/profile',[IndexController::class,'userprofile'])->name('user.profile');
Route::post('user/profile/update',[IndexController::class,'userprofileupdate'])->name('user.profile.update');
Route::post('user/profile/update/password',[IndexController::class,'userprofileupdatepass'])->name('user.profile.updatepass');
Route::get('/register',function(){
    return redirect()->route('login');
})->name('register');

Route::get('/login',[IndexController::class,'loginpage'])->name('login');
Route::get('/logout',[IndexController::class,'logout'])->name('logout');
Route::get('/forgot-password',[IndexController::class,'resetpass'])->name('resetpass');

Route::get('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
    Route::redirect('/', '/admin/login');



});
    // Admin brand group routes

Route::prefix('admin/brand')->group(function (){
    Route::get('/', [BrandController::class, 'index'])->name('brand.all');
    Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/update/{id}', [BrandController::class, 'update'])->name('brand.update');

});
    // Admin profile group routes

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
    return view('frontend.panel.dashboard');
})->name('dashboard');
