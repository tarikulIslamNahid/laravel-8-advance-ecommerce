@extends('admin.body.app')

@section('title','Brand Edit')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('brand.all')}}">Brand</a></li>
<li class="breadcrumb-item active" aria-current="page"><span>Edit</span></li>
@endsection
@section('content')
<div class="row layout-spacing">

    <div class="col-lg-12 mt-4">
        <div class="statbox widget box box-shadow">
            <div class="row d-flex justify-content-between px-3">
                    <h4>Brand Edit</h4>


            </div>
            <hr>
            <form action="{{route('brand.update',$brands->brand_slug_en)}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-row mb-4">
                    <div class="col">
                        <label for="exampleFormControlInput1">Brand Name English</label>
                      <input type="text" class="form-control" value="{{$brands->brand_name_en}}" name="brand_name_en" placeholder=" ">
                      @error('brand_name_en')
                          <span class="text-danger"> {{$message}} </span>
                      @enderror
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">Brand Name Bangla</label>
                      <input type="text" class="form-control" value="{{$brands->brand_name_bn}}" name="brand_name_bn" placeholder=" ">
                      @error('brand_name_bn')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="col">
                        <label for="exampleFormControlInput1">Brand Image</label>
                      <input type="file" class="form-control" id='image' name="brand_image" >
                      @error('brand_image')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                    </div>
                    <div class="col">
                        <img class='mt-4 rounded-circle' id='showImg' src="{{url('storage/brand/'.$brands->brand_image)}}" width="50px" height="50px" alt="">

                    </div>
                </div>
<button class="mb-4 btn btn-primary" type="submit">Update Brand</button>

            </form>
        </div>
    </div>
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
