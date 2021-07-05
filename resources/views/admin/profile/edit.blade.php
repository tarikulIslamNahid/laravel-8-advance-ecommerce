@extends('admin.body.app')

@section('title','User Profile Edit')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{route('profile.view')}}">Profile</a></li>
<li class="breadcrumb-item active" aria-current="page"><span>edit</span></li>
@endsection
@section('style')

@endsection
@section('content')
<!--  BEGIN CONTENT AREA  -->

<div class="statbox widget box box-shadow my-5">
<div class="widget-header">
    <div class="row">
        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
            <h4>Update Profile</h4>
        </div>
    </div>
</div>
<hr>
        <form action="{{route('profile.update')}}" method="post" enctype='multipart/form-data' >
            @csrf
            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name='name' value="{{$admin->name}}" placeholder="name">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" name="email" value="{{$admin->email}}" id="inputEmail4" placeholder="Email">
                </div>

            </div>
            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="name">Profile</label>
                    <input type="file" class="form-control" id="image" name="profile_photo_path">
                </div>
                <div class="form-group col-md-6">

@php
    $def='https://ui-avatars.com/api/?name='.$admin->name.'&color=7F9CF5&background=EBF4FF';
@endphp
                    <img class='mt-3' id='showImg' src="{{(!empty($admin->profile_photo_path)) ? url('storage/profile-photos/'.$admin->profile_photo_path) : $def}}" width="70px" height="70px" alt="">


                </div>

            </div>
          <button type="submit" class="btn btn-primary mt-3">Profile Update</button>
        </form>
</div>


{{-- password update  --}}

<div class="statbox widget box box-shadow my-5">
    <div class="widget-header">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>Update Profile Password</h4>
            </div>
        </div>
    </div>
    <hr>
    <div class="widget-content widget-content-area">

<form class="needs-validation" novalidate action="{{route('profile.passupdate')}}" method="post">
@csrf
<div class="form-row mb-4">

<div class="col-md-6">
<label for="validationCustom03">Current Password</label>
<input type="password" class="form-control" id="validationCustom03" name="oldpass" >

</div>
</div>
<div class="form-row">
<div class="col-md-6">

    <label for="phone">New Password</label>
    <input type="password" class="form-control"  name="newpass" >


</div>
<div class="col-md-6">
<label for="address">Confirm password</label>
<input type="password" class="form-control" name="password_confirmation">

</div>
</div>



<button class="btn btn-primary mt-3" type="submit">Reset Password</button>
</form>


</div>
</div>

{{-- password update  --}}

<!--  END CONTENT AREA  -->
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
