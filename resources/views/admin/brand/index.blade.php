@extends('admin.body.app')

@section('title','All Brands')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('brand.all')}}">Brand</a></li>
{{-- <li class="breadcrumb-item active" aria-current="page"><span>Sales</span></li> --}}
@endsection
@section('content')

    <div class="row layout-spacing">

        <div class="col-lg-12 mt-4">
            <div class="statbox widget box box-shadow">
                <div class="row d-flex justify-content-between px-3">
                        <h4>Brand List</h4>

<a href="{{route('brand.create')}}" class="btn btn-dark mb-2 mr-2  "> <span class="mr-2">Add New </span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></a>

                </div>
                <hr>
                <div class="widget-content widget-content-area">
                    <table id="style-3" class="table style-3  table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Image</th>
                                <th>Brand En</th>
                                <th>Brand Bn</th>
                                <th class="text-center dt-no-sorting">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
            <tr>
                <td class="text-center">
                    @php
                    $img="https://ui-avatars.com/api/?name=".$brand->brand_name_en."&color=7F9CF5&background=EBF4FF";
             @endphp
                    <span><img src="{{(!empty($brand->brand_image)) ? url('storage/brand/'.$brand->brand_image) : $img}}" class="profile-img" alt="avatar"></span>
                </td>
            <td>{{$brand->brand_name_en}}</td>
                <td>{{$brand->brand_name_bn}}</td>
                <td class="text-center">
                    <ul class="table-controls">
                        <li><a href="{{route('brand.edit',$brand->brand_slug_en)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                        <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                    </ul>
                </td>
            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
