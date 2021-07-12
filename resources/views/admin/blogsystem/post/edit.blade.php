@extends('admin.body.app')

@section('title','All Brands')
@section('breadcrumb')
<li class="breadcrumb-item active"><span>Blog</span></li>
<li class="breadcrumb-item"><a href="{{route('blogpost.all')}}">Post</a></li>
<li class="breadcrumb-item active" aria-current="page"><span>Edit</span></li>
@endsection
@section('content')
<div class="row layout-spacing">

    <div class="col-lg-12 mt-4">
        <div class="statbox widget box box-shadow">
            <div class="row d-flex justify-content-between px-3">
                    <h4>Create New</h4>


            </div>
            <hr>
            <form action="{{route('blogpost.update',$post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-row mb-4">
                    <div class="col">
                        <label for="exampleFormControlInput1">Post Title English</label>
                      <input type="text" class="form-control" name="post_title_en" value="{{$post->post_title_en}}" placeholder=" ">
                      @error('post_title_en')
                          <span class="text-danger"> {{$message}} </span>
                      @enderror
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">Post Title Bangla</label>
                      <input type="text" class="form-control" value="{{$post->post_title_bn}}" name="post_title_bn" placeholder=" ">
                      @error('post_title_bn')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                    </div>
                </div>

                <div class="form-row mb-4">

                    <div class="col-md-6">
                        <label for="exampleFormControlInput1">Category</label>
                       <select name="category_id" class="form-control" id="">
                           <option value="">Select Category</option>
@foreach ($categories as $category)

<option value="{{$category->id}}" {{$category->id==$post->category_id ? ' selected': ''}} >{{$category->blog_category_name_en}}</option>

@endforeach

                        </select>
                      @error('category_id')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="exampleFormControlInput1">Thumbnail Image</label>
                      <input type="file" class="form-control" id='image' name="post_image" >
                      @error('post_image')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                    </div>
                    <div class="col">
                        <img class='mt-4 rounded-circle' id='showImg' src="{{url('storage/post/'.$post->post_image)}}" width="50px" height="50px" alt="">

                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="col">
                        <label for="exampleFormControlInput1">Blog Description En</label>
                        <textarea name="post_details_en"  value="{{old('post_details_en')}}"  class="form-control" id="" cols="20" rows="5">
                            {{$post->post_details_en}}
                        </textarea>
                        @error('post_details_en')
                            <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">Blog Description Bn</label>
                        <textarea name="post_details_bn"  value="{{old('post_details_bn')}}"  class="form-control" id="" cols="20" rows="10">
                            {{$post->post_details_bn}}
                        </textarea>

                        @error('post_details_bn')
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
