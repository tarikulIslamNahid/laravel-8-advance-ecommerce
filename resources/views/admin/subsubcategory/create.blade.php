@extends('admin.body.app')

@section('title','Create Sub Categories')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('subsubcategory.all')}}">Sub Sub Category</a></li>
<li class="breadcrumb-item active" aria-current="page"><span>Create</span></li>
@endsection
@section('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
@section('content')
<div class="row layout-spacing">

    <div class="col-lg-12 mt-4">
        <div class="statbox widget box box-shadow">
            <div class="row d-flex justify-content-between px-3">
                    <h4>Create New</h4>


            </div>
            <hr>
            <form action="{{route('subsubcategory.store')}}" method="POST" >
            @csrf
                <div class="form-row mb-4">
                    <div class="col">
                        <label for="exampleFormControlInput1">Sub Subcategory Name English</label>
                      <input type="text" class="form-control" name="subsub_category_name_en" placeholder=" ">
                      @error('subsub_category_name_en')
                          <span class="text-danger"> {{$message}} </span>
                      @enderror
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1">Sub Subcategory Name Bangla</label>
                      <input type="text" class="form-control" name="subsub_category_name_bn" placeholder=" ">
                      @error('subsub_category_name_bn')
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

                    <div class="col">
                        <label for="exampleFormControlInput1"> Sub Category</label>
                       <select name="subcategory_id" class="form-control" id="">

<option value=" ">Select Sub Category</option>

                        </select>
                      @error('subcategory_id')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                    </div>

                </div>
<button class="mb-4 btn btn-primary" type="submit">Create</button>

            </form>
        </div>
    </div>
</div>


<script>
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/admin/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.sub_category_name_en + '</option>');
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

@section('script')

@endsection
