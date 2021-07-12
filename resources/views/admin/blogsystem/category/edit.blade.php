@extends('admin.body.app')

@section('title','Blog Category Edit')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('blogcat.all')}}">category</a></li>
<li class="breadcrumb-item active" aria-current="page"><span>Edit</span></li>
@endsection
@section('content')
<div class="row layout-spacing">

    <div class="col-lg-12 mt-4">
        <div class="statbox widget box box-shadow">
            <div class="row d-flex justify-content-between px-3">
                    <h4>category Edit</h4>


            </div>
            <hr>
            <form action="{{route('blogcat.update',$categories->blog_category_slug_en)}}" method="POST">
            @csrf
            <div class="form-row mb-4">
                <div class="col">
                    <label for="exampleFormControlInput1">Category Name En</label>
                  <input type="text" class="form-control" value="{{$categories->blog_category_name_en}}" name="blog_category_name_en" placeholder=" ">
                  @error('blog_category_name_en')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                </div>

            </div>

            <div class="form-row mb-4">
                <div class="col">
                    <label for="exampleFormControlInput1">Category Name Bn</label>
                  <input type="text" class="form-control" value="{{$categories->blog_category_name_bn}}" name="blog_category_name_bn" placeholder=" ">
                  @error('blog_category_name_bn')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                </div>

            </div>

<button class="mb-4 btn btn-primary" type="submit">Update category</button>

            </form>
        </div>
    </div>
</div>

@endsection
