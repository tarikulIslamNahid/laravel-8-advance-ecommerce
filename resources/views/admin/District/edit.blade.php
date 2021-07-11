@extends('admin.body.app')

@section('title','Edit District')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('district.all')}}">District</a></li>
<li class="breadcrumb-item active" aria-current="page"><span>Edit</span></li>
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
        <form action="{{route('district.update',$districts->id)}}" method="POST" >
        @csrf
            <div class="form-row mb-4">
                <div class="col">
                    <label for="exampleFormControlInput1">Division Name</label>
                    <select name="division_id" class="form-control" id="">
                        <option value="">Select Division</option>
                        @foreach ($divisions as $division)
 <option value="{{$division->id}}" {{$division->id==$districts->division_id ? 'selected': ''}} >{{$division->division_name}}</option>
                        @endforeach

                    </select>
                  @error('division_id')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1">Division Name</label>
                  <input type="text" class="form-control" value="{{$districts->district_name}}" name="district_name" placeholder=" ">
                  @error('district_name')
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
