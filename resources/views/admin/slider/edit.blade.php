@extends('admin.body.app')

@section('title','Edit Slider')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('slider.all')}}">Slider</a></li>
<li class="breadcrumb-item active" aria-current="page"><span>Edit</span></li>
@endsection
@section('content')
<div class="row layout-spacing">

    <div class="col-lg-12 mt-4">
        <div class="statbox widget box box-shadow">

            <hr>
            <form action="{{route('slider.update',$sliders->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-row mb-4">
                    <div class="col">
                        <label for="exampleFormControlInput1">Slider Title</label>
                      <input type="text" value='{{$sliders->title}}' class="form-control" name="title" placeholder=" ">
                      @error('title')
                          <span class="text-danger"> {{$message}} </span>
                      @enderror
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">Slider Link</label>
                      <input type="text" class="form-control" value='{{$sliders->link}}' name="link" placeholder="https://example.com">
                      @error('link')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                    </div>
                </div>

                <div class="form-row mb-4">

                    <div class="col">
                        <label for="exampleFormControlInput1">Slider Description</label>
                        <textarea name="description" value="{{old('description')}}" class="form-control" id="" cols="10" rows="10">
                            {{$sliders->description}}
                        </textarea>

                        @error('description')
                        <span class="text-danger"> {{$message}} </span>
                    @enderror
                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="col">
                        <label for="exampleFormControlInput1">Slider Image</label>
                      <input type="file" class="form-control" id='image' name="slider_img" >
                      @error('slider_img')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                    </div>
                    <div class="col">
                        <img class='mt-4 rounded-circle' id='showImg' src="{{url('storage/slider/'.$sliders->slider_img)}}" width="50px" height="50px" alt="">

                    </div>
                </div>
<button class="mb-4 btn btn-primary" type="submit">Update</button>

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
