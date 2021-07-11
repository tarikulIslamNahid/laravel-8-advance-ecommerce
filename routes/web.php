<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\categoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\IndexController;

// frontend home page
Route::get('/',[IndexController::class,'index'])->name('home');

// frontend user profile routes group
Route::group(['prefix'=>'user','middleware'=>['auth:sanctum,web', 'verified']],function (){

    Route::get('/profile',[IndexController::class,'userprofile'])->name('user.profile');
    Route::post('/profile/update',[IndexController::class,'userprofileupdate'])->name('user.profile.update');
    Route::post('/profile/update/password',[IndexController::class,'userprofileupdatepass'])->name('user.profile.updatepass');


});
// frontend user redirect for register
Route::get('/register',function(){
    return redirect()->route('login');
})->name('register');

// frontend user login page
Route::get('/login',[IndexController::class,'loginpage'])->name('login');

//  frontend user logout
Route::get('/logout',[IndexController::class,'logout'])->name('logout');

// frontend user password reset
Route::get('/forgot-password',[IndexController::class,'resetpass'])->name('resetpass');

// frontend user dashboard
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('frontend.panel.dashboard');
})->name('dashboard');

// admin login routes group
Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){

    Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
    Route::redirect('/', '/admin/login');

});

// admin logout
Route::get('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

// Admin Dashboard
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.dashboard.index');
})->name('admin.dashboard');

// Admin brand group routes
Route::group(['prefix'=>'admin/brand','middleware'=>['auth:sanctum,admin', 'verified']],function (){
    Route::get('/', [BrandController::class, 'index'])->name('brand.all');
    Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');

});

// Admin profile group routes
Route::prefix('admin/profile')->group(function (){
    Route::get('/',[ProfileController::class,'index'])->name('profile.view');

    Route::get('/edit',[ProfileController::class,'edit'])->name('profile.edit');
    Route::post('/update',[ProfileController::class,'update'])->name('profile.update');
    Route::get('/password/edit',[ProfileController::class,'passedit'])->name('profile.reset');
    Route::post('/password/update',[ProfileController::class,'passupdate'])->name('profile.passupdate');
});


// Admin Category group routes
Route::group(['prefix'=>'admin/category','middleware'=>['auth:sanctum,admin', 'verified']],function (){
    Route::get('/', [categoryController::class, 'index'])->name('category.all');
    Route::get('/create', [categoryController::class, 'create'])->name('category.create');
    Route::post('/store', [categoryController::class, 'store'])->name('category.store');
    Route::get('edit/{id}', [categoryController::class, 'edit'])->name('category.edit');
    Route::post('/update/{id}', [categoryController::class, 'update'])->name('category.update');
    Route::get('/delete/{id}', [categoryController::class, 'delete'])->name('category.delete');


    // ajax  get sub category by category dependencies
    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'getSubCat']);
    Route::get('/subsubcategory/ajax/{category_id}', [SubCategoryController::class, 'getSubSubCat']);



});

// Admin Sub Category group routes
Route::group(['prefix'=>'admin/subcategory','middleware'=>['auth:sanctum,admin', 'verified']],function (){
    Route::get('/',[SubCategoryController::class,'index'])->name('subcategory.all');
    Route::get('/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
    Route::post('/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
    Route::get('edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
    Route::get('/delete/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');

});

// Admin Sub Sub Category group routes
Route::group(['prefix'=>'admin/sub/subcategory','middleware'=>['auth:sanctum,admin', 'verified']],function (){
    Route::get('/',[SubCategoryController::class,'subindex'])->name('subsubcategory.all');
    Route::get('/create', [SubCategoryController::class, 'subcreate'])->name('subsubcategory.create');
    Route::post('/store', [SubCategoryController::class, 'substore'])->name('subsubcategory.store');
    Route::get('edit/{id}', [SubCategoryController::class, 'subedit'])->name('subsubcategory.edit');
    Route::post('/update/{id}', [SubCategoryController::class, 'subupdate'])->name('subsubcategory.update');
    Route::get('/delete/{id}', [SubCategoryController::class, 'subdelete'])->name('subsubcategory.delete');
});

// Admin Product group routes
Route::group(['prefix'=>'admin/product','middleware'=>['auth:sanctum,admin', 'verified']],function (){
    Route::get('/', [ProductController::class, 'index'])->name('product.all');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

});

// Admin Sliders group routes
Route::group(['prefix'=>'admin/slider','middleware'=>['auth:sanctum,admin', 'verified']],function (){
    Route::get('/', [SliderController::class, 'index'])->name('slider.all');
    Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('/update/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::get('/inactive/{id}', [SliderController::class, 'inactive'])->name('slider.inactive');
    Route::get('/active/{id}', [SliderController::class, 'active'])->name('slider.active');
    Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');

});









