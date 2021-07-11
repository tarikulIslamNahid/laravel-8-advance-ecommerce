@extends('admin.body.app')

@section('title','All Divisions')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('division.all')}}">Division</a></li>
{{-- <li class="breadcrumb-item active" aria-current="page"><span>Sales</span></li> --}}
@endsection
@section('content')

    <div class="row layout-spacing">

        <div class="col-lg-8 mt-4">
            <div class="statbox widget box box-shadow">
                <div class="row d-flex justify-content-between px-3">
                        <h4>Divisions List</h4>


                </div>
                <hr>
                <div class="widget-content widget-content-area">
                    <table id="style-3" class="table style-3  table-hover">
                        <thead>
                            <tr>

                                <th>Division Name</th>
                                <th class="text-center dt-no-sorting">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($divisions as $division)
            <tr>

                <td>{{$division->division_name}}</td>
                <td class="text-center">
                    <ul class="table-controls">
                        <li><a href="{{route('division.edit',$division->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                        <li><a href="{{route('division.delete',$division->id)}}" id="delete" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                    </ul>
                </td>
            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>


{{-- create side bar --}}

<div class="col-lg-4 mt-4">
    <div class="statbox widget box box-shadow">
        <div class="row d-flex justify-content-between px-3">
                <h4>Create New</h4>


        </div>
        <hr>
        <form action="{{route('division.store')}}" method="POST" >
        @csrf
            <div class="form-row mb-4">
                <div class="col">
                    <label for="exampleFormControlInput1">Division Name</label>
                  <input type="text" class="form-control" name="division_name" placeholder=" ">
                  @error('division_name')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                </div>

            </div>

<button class="mb-4 btn btn-primary" type="submit">Create</button>

        </form>
    </div>
</div>
{{-- create side bar --}}

    </div>

@endsection
