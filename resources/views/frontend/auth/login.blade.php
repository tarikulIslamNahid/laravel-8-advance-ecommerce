@extends('frontend.body.app')
@section('title','Ecommerce Login and Register Page')
@section('content')


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{route('home')}}">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Sign in</h4>
	<p class="">Hello, Welcome to your account.</p>
	<div class="social-sign-in outer-top-xs">
		<a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
		<a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
	</div>
        <form class="register-form outer-top-xs" role="form" method="POST" action="{{ url('login')}}">
            @csrf

		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" class="form-control unicase-form-control text-input" id="email" name="email" :value="old('email')" required>

		</div>
	  	<div class="form-group">
		    <label class="info-title" for="password">Password <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" name="password" required autocomplete="current-password" id="password" >
		</div>
		<div class="radio outer-xs">
		  	<label>
		    	<input type="radio"  id="remember_me" name="remember" value="option2">Remember me!
		  	</label>
              @if (Route::has('password.request'))
              <a class="forgot-password pull-right" href="{{ route('password.request') }}">
                  {{ __('Forgot your password?') }}
              </a>
          @endif
		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
	</form>
</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
	<h4 class="checkout-subtitle">Create a new account</h4>
	<p class="text title-tag-line">Create your new account.</p>

        <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('register') }}">
            @csrf

		<div class="form-group">
	    	<label class="info-title" for="email">Email Address <span>*</span></label>
	    	<input id="email" type="email" name="email" :value="old('email')" required  class="form-control unicase-form-control text-input" >
	  	</div>
        <div class="form-group">
		    <label class="info-title" for="name">Name <span>*</span></label>
		    <input id="name"  type="text" name="name" :value="old('name')" class="form-control unicase-form-control text-input"   >
		</div>
        <div class="form-group">
		    <label class="info-title" for="phone">Phone Number <span>*</span></label>
		    <input  type="text" name="phone" :value="old('phone')"  class="form-control unicase-form-control text-input" id="phone" >
		</div>
        <div class="form-group">
		    <label class="info-title" for="password">Password <span>*</span></label>
		    <input id="password" type="password" name="password" required autocomplete="new-password" class="form-control unicase-form-control text-input" >
		</div>
         <div class="form-group">
		    <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
		    <input id="password_confirmation" type="password" name="password_confirmation" required  class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
	</form>


</div>
<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<div class="logo-slider-inner">
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item m-t-10">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->

</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->


@endsection
