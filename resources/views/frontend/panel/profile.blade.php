@extends('frontend.body.app')
@section('title','Ecommerce User Profile')
@section('style')
@endsection
@section('content')
<div class="container page-body-wrapper">
    {{-- sidebar menu --}}
    @include('frontend.panel.sidebar')
    {{-- sidebar menu --}}

    {{-- main-panel --}}
    <div class="main-panel">
        <!-- Content--->
        <div class="aiz-titlebar mt-2 mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="h3">Manage Profile</h1>
                </div>
            </div>
        </div>
        <!-- basic--->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Basic Info</h5>
            </div>
            <div class="card-body">
                <form action="{{route('user.profile.update')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Your name</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Your name" name="name"
                                value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Your Email</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Your Email" name="email" value="{{$user->email}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Your Phone</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Your Phone" name="phone" value="{{$user->phone}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Photo</label>
                        <div class="col-md-8">
                            <input type="file" name="profile_photo_path" id="image" class="form-control">
                        </div>
                        <div class="col-md-2">
                            @php
                                    $img="https://ui-avatars.com/api/?name=".$user->name."&color=7F9CF5&background=EBF4FF";
                             @endphp
                          <img src=" {{(!empty($user->profile_photo_path)) ? url('storage/profile-photos/'.$user->profile_photo_path) : $img}} " id='showImg' width="50"  class="img-fluid" alt="avatar">
                        </div>
                    </div>

                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- password reset -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Password Reset</h5>
            </div>
            <div class="card-body">
                <form action="{{route('user.profile.updatepass')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Current password</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control" id="validationCustom03" name="oldpass" >

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">New Password</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control"  name="newpass" >

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Confirm Password</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control" name="password_confirmation">

                        </div>
                    </div>


                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Content--->
    </div>
    {{-- main-panel --}}

</div>
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function(){
    $('#image').change(function(e){
        let reader = new FileReader();
        reader.onload = function(e){
            $('#showImg').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files[0]);
    });
});
    window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
}, false);
</script>
@endsection
