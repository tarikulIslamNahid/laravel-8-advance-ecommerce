@extends('admin.body.app')

@section('title','All Divisions')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('division.all')}}">Categories</a></li>
{{-- <li class="breadcrumb-item active" aria-current="page"><span>Sales</span></li> --}}
@endsection
@section('content')

    <div class="row layout-spacing">


{{-- update division --}}

<div class="col-lg-12 mt-4">
    <div class="statbox widget box box-shadow">
        <div class="row d-flex justify-content-between px-3">
                <h4>Create New</h4>


        </div>
        <hr>
        <form action="{{route('division.update',$divisions->id)}}" method="POST" >
        @csrf
            <div class="form-row mb-4">
                <div class="col">
                    <label for="exampleFormControlInput1">Division Name</label>
                  <input type="text" class="form-control" value="{{$divisions->division_name}}" name="division_name" placeholder=" ">
                  @error('division_name')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                </div>

            </div>

<button class="mb-4 btn btn-primary" type="submit">Update</button>

        </form>
    </div>
</div>
{{--update division --}}

    </div>

@endsection
