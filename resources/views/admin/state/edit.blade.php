@extends('admin.body.app')

@section('title','Edit State')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('district.all')}}">State</a></li>
<li class="breadcrumb-item active" aria-current="page"><span>Edit</span></li>
@endsection
@section('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
@section('content')

    <div class="row layout-spacing">


{{-- update division --}}

<div class="col-lg-12 mt-4">
    <div class="statbox widget box box-shadow">
        <div class="row d-flex justify-content-between px-3">
                <h4>Update State</h4>


        </div>
        <hr>
        <form action="{{route('state.update',$state->id)}}" method="POST" >
        @csrf
            <div class="form-row mb-4">
                <div class="col">
                    <label for="exampleFormControlInput1">Division Name</label>
                    <select name="division_id" class="form-control" id="">
                        <option value="">Select Division</option>
                        @foreach ($divisions as $division)
 <option value="{{$division->id}}" {{$division->id==$state->division_id ? 'selected': ''}} >{{$division->division_name}}</option>
                        @endforeach

                    </select>
                  @error('division_id')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                </div>

                <div class="col">
                    <label for="exampleFormControlInput1">District Name</label>
                    <select name="district_id" class="form-control" id="district_id">
                        <option value="">Select District</option>
                        @foreach ($districts as $district)
                        <option value="{{$district->id}}" {{($district->id==$state->district_id) ? 'selected': ''}} >{{$district->district_name}}</option>
                                            @endforeach
                    </select>
                  @error('district_id')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                </div>

                <div class="col">
                    <label for="exampleFormControlInput1">State Name</label>
                  <input type="text" class="form-control" value="{{$state->state_name}}" name="state_name" placeholder=" ">
                  @error('state_name')
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

    <script>
        $(document).ready(function() {
          $('select[name="division_id"]').on('change', function(){
              var division_id = $(this).val();
              if(division_id) {
                  $.ajax({
                      url: "{{  url('/admin/shipping/division/ajax') }}/"+division_id,
                      type:"GET",
                      dataType:"json",
                      success:function(data) {
                         var d =$('select[name="district_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                            });
                      },
                  });
              } else {
                  alert('danger');
              }
          });
      });
  </script>

@endsection
