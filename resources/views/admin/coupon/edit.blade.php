@extends('admin.body.app')

@section('title','Update Coupons')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('coupon.all')}}">Coupon</a></li>
<li class="breadcrumb-item active" aria-current="page"><span>Edit</span></li>
@endsection
@section('content')
<div class="row layout-spacing">

    <div class="col-lg-12 mt-4">
        <div class="statbox widget box box-shadow">
            <div class="row d-flex justify-content-between px-3">
                    <h4>Update Coupon</h4>


            </div>
            <hr>
            <form action="{{route('coupon.update',$coupon->id)}}" method="POST" >
            @csrf
                <div class="form-row mb-4">
                    <div class="col">
                        <label for="exampleFormControlInput1">coupon Name</label>
                      <input type="text" class="form-control" value="{{$coupon->coupon_name}}" name="coupon_name" placeholder=" ">
                      @error('coupon_name')
                          <span class="text-danger"> {{$message}} </span>
                      @enderror
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">Coupon Discount(%)</label>
                      <input type="text" class="form-control" value="{{$coupon->coupon_discount}}" name="coupon_discount" placeholder=" ">
                      @error('coupon_discount')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="col">
                        <label for="exampleFormControlInput1">Coupon Validity Date</label>
	 <input type="date" name="coupon_validity" value="{{$coupon->coupon_validity}}" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">

                      @error('coupon_icon')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                    </div>

                </div>
<button class="mb-4 btn btn-primary" type="submit">Update</button>

            </form>
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection
