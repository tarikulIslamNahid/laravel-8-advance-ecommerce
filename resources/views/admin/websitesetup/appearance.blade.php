@extends('admin.body.app')

@section('title','Appearance')
@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page"><span>Website Setup</span></li>
<li class="breadcrumb-item"><a href="{{route('appearance.all')}}">Appearance</a></li>
@endsection
@section('content')
<div class="row layout-spacing">

    <div class="col-lg-12 mt-4">
        <div class="statbox widget box box-shadow">
            <div class="row d-flex justify-content-between px-3">
                    <h4>General</h4>


            </div>
            <hr>
            <form action="{{route('appearance.updategen')}}" method="POST" enctype="multipart/form-data" >
            @csrf
                <div class="form-row mb-4">
                    <div class="col">
                        <label for="exampleFormControlInput1">Frontend Website Name</label>
                      <input type="text" class="form-control"value="{{$appearance->website_name}}" name="website_name" placeholder=" ">
                      @error('website_name')
                          <span class="text-danger"> {{$message}} </span>
                      @enderror
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">Site Motto</label>
                      <input type="text" class="form-control" value="{{$appearance->site_motto}}"  name="site_motto" placeholder=" ">
                      @error('site_motto')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="col">
                        <label for="exampleFormControlInput1">Site Logo</label>
                      <input type="file" class="form-control" id='image' name="site_logo" >
                      @error('site_logo')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                    </div>
                    <div class="col">
                        @php
    $def='https://ui-avatars.com/api/?name=Genaral&color=7F9CF5&background=EBF4FF';
@endphp
                        <img class='mt-4 rounded-circle' id='showImg' src="{{(!empty($appearance->site_logo)) ? url('storage/websitesetup/'.$appearance->site_logo) : $def}}" width="50px" height="50px" alt="">

                    </div>
                </div>
<button class="mb-4 btn btn-primary" type="submit">Update</button>

            </form>
        </div>
    </div>

{{-- Global Seo --}}
<div class="col-lg-12 mt-4">
    <div class="statbox widget box box-shadow">
        <div class="row d-flex justify-content-between px-3">
                <h4>Global Seo</h4>


        </div>
        <hr>
        <form action="{{route('appearance.updatemeta')}}" method="POST" enctype="multipart/form-data" >
        @csrf
            <div class="form-row mb-4">
                <div class="col">
                    <label for="exampleFormControlInput1">Meta Title</label>
                  <input type="text" class="form-control"  value="{{$appearance->meta_title}}" name="meta_title" placeholder=" ">
                  @error('meta_title')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1">Meta description</label>
                  <input type="text" class="form-control"  value="{{$appearance->meta_desc}}" name="meta_desc" placeholder=" ">
                  @error('meta_desc')
                  <span class="text-danger"> {{$message}} </span>
              @enderror
                </div>
            </div>

            <div class="form-row mb-4">
                <div class="col">
                    <label for="exampleFormControlInput1">Meta Image</label>
                  <input type="file" class="form-control" id='meta_img' name="meta_img" >
                  @error('meta_img')
                  <span class="text-danger"> {{$message}} </span>
              @enderror
                </div>
                <div class="col">
                    <img class='mt-4 rounded-circle' id='showMetaImg' src="{{(!empty($appearance->meta_img)) ? url('storage/websitesetup/'.$appearance->meta_img) : $def}}" width="50px" height="50px" alt="">

                </div>
            </div>
<button class="mb-4 btn btn-primary" type="submit">Update</button>

        </form>
    </div>
</div>
{{-- Global Seo --}}

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

    // meta images
    $('#meta_img').change(function(e){
        let reader = new FileReader();
        reader.onload = function(e){
            $('#showMetaImg').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files[0]);
    });
});

</script>
@endsection
