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
<h4 class='py-3'>Profile Edit</h4>
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
          <button type="submit" class="btn btn-primary mt-3">Sign in</button>
        </form>

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
