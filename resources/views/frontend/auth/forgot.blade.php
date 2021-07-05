@extends('frontend.body.app')
@section('title','Ecommerce Forgot Password Page')
@section('content')


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{route('home')}}">Home</a></li>
				<li class='active'>Forgot</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-sm ">
	<div class="container">
		<div class="">
<div class="sign-in-page col-md-12 my-4 col-sm-12 sign-in">

	<p class="">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>

        <form class="register-form outer-top-xs"   method="POST" action="{{ route('password.email')}}">
            @csrf

		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" class="form-control unicase-form-control text-input" id="email" name="email" :value="old('email')" required>
@error('email')
    <span class="invalid-feedback" role="alert">
        <strong> {{$message}}</strong>
    </span>
@enderror
		</div>

	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Email Password Reset Link</button>
	</form>
</div>
<!-- Sign-in -->

<!-- create a new account -->			</div><!-- /.row -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->


@endsection
