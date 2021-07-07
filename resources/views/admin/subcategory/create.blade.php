@extends('admin.body.app')

@section('title','Create Sub Categories')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('subcategory.all')}}">Sub Category</a></li>
<li class="breadcrumb-item active" aria-current="page"><span>Create</span></li>
@endsection
@section('content')
<div class="row layout-spacing">

    <div class="col-lg-12 mt-4">
        <div class="statbox widget box box-shadow">
            <div class="row d-flex justify-content-between px-3">
                    <h4>Create New</h4>


            </div>
            <hr>
            <form action="{{route('subcategory.store')}}" method="POST" >
            @csrf
                <div class="form-row mb-4">
                    <div class="col">
                        <label for="exampleFormControlInput1">subcategory Name English</label>
                      <input type="text" class="form-control" name="sub_category_name_en" placeholder=" ">
                      @error('sub_category_name_en')
                          <span class="text-danger"> {{$message}} </span>
                      @enderror
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">subcategory Name Bangla</label>
                      <input type="text" class="form-control" name="sub_category_name_bn" placeholder=" ">
                      @error('sub_category_name_bn')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="col">
                        <label for="exampleFormControlInput1">Category</label>
                       <select name="category_id" class="form-control" id="">
@foreach ($categories as $category)

<option value="{{$category->id}}">{{$category->category_name_en}}</option>

@endforeach

                        </select>
                      @error('category_id')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                    </div>

                </div>
<button class="mb-4 btn btn-primary" type="submit">Create</button>

            </form>
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection
