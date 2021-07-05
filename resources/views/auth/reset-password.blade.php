@extends('frontend.body.app')
@section('title','Ecommerce Reset Password Page')
@section('content')


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{route('home')}}">Home</a></li>
				<li class='active'>Reset Password</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-sm ">
	<div class="container">
		<div class="">
<div class="sign-in-page col-md-12 my-4 col-sm-12 sign-in">

	<p class="">Password Reset</p>

        <form class="register-form outer-top-xs"   method="POST" action="{{ route('password.update')}}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="form-group">
                <label class="info-title" for="email">Email <span>*</span></label>
                <input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus  class="form-control unicase-form-control text-input" >
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong> {{$message}}</strong>
                </span>
            @enderror
            </div>
            <div class="form-group">
                <label class="info-title" for="password">Password <span>*</span></label>
                <input id="password" type="password" name="password" required autocomplete="new-password" class="form-control unicase-form-control text-input" >
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong> {{$message}}</strong>
                </span>
            @enderror
            </div>
             <div class="form-group">
                <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
                <input id="password_confirmation" type="password" name="password_confirmation" required  class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong> {{$message}}</strong>
                </span>
            @enderror
            </div>
              <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password</button>

	</form>
</div>
<!-- Sign-in -->

<!-- create a new account -->			</div><!-- /.row -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->


@endsection
