@extends('admin.body.app')

@section('title','All categories')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('category.all')}}">category</a></li>
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
            <form action="{{route('category.store')}}" method="POST" >
            @csrf
                <div class="form-row mb-4">
                    <div class="col">
                        <label for="exampleFormControlInput1">category Name English</label>
                      <input type="text" class="form-control" name="category_name_en" placeholder=" ">
                      @error('category_name_en')
                          <span class="text-danger"> {{$message}} </span>
                      @enderror
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">category Name Bangla</label>
                      <input type="text" class="form-control" name="category_name_bn" placeholder=" ">
                      @error('category_name_bn')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="col">
                        <label for="exampleFormControlInput1">category Icon</label>
                        <input type="text" class="form-control" name="category_icon" placeholder="Example: fa fa-user">

                      @error('category_icon')
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
