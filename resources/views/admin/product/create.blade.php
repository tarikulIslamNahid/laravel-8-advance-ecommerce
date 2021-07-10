@extends('admin.body.app')

@section('title','Create Product')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('product.all')}}">Product</a></li>
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
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row mb-4">
                <div class="col">
                    <label for="exampleFormControlInput1">Product Name English</label>
                    <input type="text" value="{{old('product_name_en')}}" class="form-control" name="product_name_en" placeholder=" ">
                    @error('product_name_en')
                        <span class="text-danger"> {{$message}} </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1">Product Name Bangla</label>
                    <input type="text"  value="{{old('product_name_bn')}}" class="form-control" name="product_name_bn" placeholder=" ">
                    @error('product_name_bn')
                    <span class="text-danger"> {{$message}} </span>
                @enderror
                </div>
            </div>

                <div class="form-row mb-4">
                    <div class="col">
                        <label for="exampleFormControlInput1">Category</label>
                       <select name="category_id" value="{{old('category_id')}}" class="form-control" id="">
                        <option value=" ">Select Category</option>

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
                       <select name="subcategory_id" value="{{old('subcategory_id')}}"  class="form-control" id="">

<option value=" ">Select Sub Category</option>

                        </select>
                      @error('subcategory_id')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                    </div>


                    <div class="col">
                        <label for="exampleFormControlInput1"> Sub Sub Category</label>
                       <select name="subsubcategory_id" value="{{old('subsubcategory_id')}}" class="form-control" id="">

<option value=" ">Select Sub Sub Category</option>

                        </select>
                      @error('subsubcategory_id')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                    </div>




                </div>


                <div class="form-row mb-4">
                    <div class="col">
                        <label for="exampleFormControlInput1">Brand</label>
                       <select value="{{old('brand_id')}}" name="brand_id" class="form-control" id="">
                        <option value=" ">Select Brand</option>

@foreach ($brands as $brand)

<option value="{{$brand->id}}">{{$brand->brand_name_en}}</option>

@endforeach

                        </select>
                      @error('brand_id')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                    </div>

                    <div class="col">
                        <label for="exampleFormControlInput1"> Product Code </label>
                        <input value="{{old('product_code')}}" type="text" class="form-control" name="product_code" placeholder=" ">

                      @error('product_code')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                    </div>


                    <div class="col">
                        <label for="exampleFormControlInput1"> Product Quantity</label>
                        <input type="text"  value="{{old('product_qty')}}"  class="form-control" name="product_qty" placeholder=" ">

                      @error('product_qty')
                      <span class="text-danger"> {{$message}} </span>
                  @enderror
                    </div>
  </div>

  <div class="form-row mb-4">
    <div class="col">
        <label for="exampleFormControlInput1"> Product Tags En </label>
        <input type="text" name="product_tags_en" value="{{old('product_tags_en')}}" class="form-control" data-role="tagsinput"  >

      @error('product_tags_en')
      <span class="text-danger"> {{$message}} </span>
  @enderror
    </div>

    <div class="col">
        <label for="exampleFormControlInput1"> Product Tags Bn </label>
        <input type="text" name="product_tags_bn" class="form-control" value="{{old('product_tags_bn')}}" data-role="tagsinput"  >

      @error('product_tags_bn')
      <span class="text-danger"> {{$message}} </span>
  @enderror
    </div>


    <div class="col">
        <label for="exampleFormControlInput1"> Product Size En</label>
        <input type="text" name="product_size_en" class="form-control" value="{{old('product_size_en')}}" data-role="tagsinput" >

      @error('product_size_en')
      <span class="text-danger"> {{$message}} </span>
  @enderror
    </div>

</div>


<div class="form-row mb-4">
    <div class="col">
        <label for="exampleFormControlInput1"> Product Size Bn </label>
        <input type="text" name="product_size_bn" class="form-control" value="{{old('product_size_bn')}}" data-role="tagsinput" >

      @error('product_size_bn')
      <span class="text-danger"> {{$message}} </span>
  @enderror
    </div>

    <div class="col">
        <label for="exampleFormControlInput1"> Product Color En </label>
        <input type="text" name="product_color_en" class="form-control" value="{{old('product_color_en')}}" data-role="tagsinput"  >

      @error('product_color_en')
      <span class="text-danger"> {{$message}} </span>
  @enderror
    </div>


    <div class="col">
        <label for="exampleFormControlInput1"> Product Color Bn</label>
        <input type="text" name="product_color_bn" class="form-control"  value="{{old('product_color_bn')}}" data-role="tagsinput"  >

      @error('product_color_bn')
      <span class="text-danger"> {{$message}} </span>
  @enderror
    </div>

</div>

<div class="form-row mb-4">
    <div class="col">
        <label for="exampleFormControlInput1">Product Selling Price</label>
        <input type="text" class="form-control"  value="{{old('selling_price')}}"  name="selling_price" placeholder=" ">
        @error('selling_price')
            <span class="text-danger"> {{$message}} </span>
        @enderror
    </div>
    <div class="col">
        <label for="exampleFormControlInput1">Product Discount Price</label>
        <input type="text" class="form-control" value="{{old('discount_price')}}" name="discount_price" placeholder=" ">
        @error('discount_price')
        <span class="text-danger"> {{$message}} </span>
    @enderror
    </div>
</div>

<div class="form-row mb-4">
    <div class="col">
        <label for="exampleFormControlInput1">Main Thambnail</label>
        <input type="file" class="form-control" value="{{old('product_thambnail')}}" name="product_thambnail" id="product_thumb"  >

        <img class='mt-3 d-none' id='showThumbImg' src="https://ui-avatars.com/api/?name=P Name&color=7F9CF5&background=EBF4FF" width="50px" height="50px" alt="">

        @error('product_thambnail')
            <span class="text-danger"> {{$message}} </span>
        @enderror
    </div>
    <div class="col">
        <label for="exampleFormControlInput1">Multiple Image</label>
        <input type="file" class="form-control" value="{{old('multi_img')}}" id='multi_img' multiple name="multi_img[]" >
        <div class="row ml-2" id="preview_img"></div>

        @error('multi_img')
        <span class="text-danger"> {{$message}} </span>
    @enderror
    </div>
</div>

<div class="form-row mb-4">
    <div class="col">
        <label for="exampleFormControlInput1">Short Description En</label>
        <textarea name="short_descp_en"  value="{{old('short_descp_en')}}"  class="form-control" id="" cols="20" rows="10"></textarea>
        @error('short_descp_en')
            <span class="text-danger"> {{$message}} </span>
        @enderror
    </div>
    <div class="col">
        <label for="exampleFormControlInput1">Short Description Bn</label>
        <textarea name="short_descp_bn"  value="{{old('short_descp_bn')}}"  class="form-control" id="" cols="20" rows="10"></textarea>

        @error('short_descp_bn')
        <span class="text-danger"> {{$message}} </span>
    @enderror
    </div>
</div>

<div class="form-row mb-4">
    <div class="col">
        <label for="exampleFormControlInput1">Long Description En</label>
        <textarea name="long_descp_en" value="{{old('long_descp_en')}}"  class="form-control" id="" cols="20" rows="10"></textarea>

        @error('long_descp_en')
            <span class="text-danger"> {{$message}} </span>
        @enderror
    </div>

</div>

<div class="form-row mb-4">

    <div class="col">
        <label for="exampleFormControlInput1">Long Description Bn</label>
        <textarea name="long_descp_bn" value="{{old('long_descp_bn')}}" class="form-control" id="" cols="20" rows="10"></textarea>

        @error('long_descp_bn')
        <span class="text-danger"> {{$message}} </span>
    @enderror
    </div>
</div>

<div class="form-row mb-4">
    <div class="col">
        <label for="exampleFormControlInput1">Digital Product  <span class="text-danger"> pdf,xlx,csv</span></label>
        <input type="file" class="form-control" value="{{old('digital_file')}}"  name="digital_file" id="digital_file"  >

        @error('digital_file')
            <span class="text-danger"> {{$message}} </span>
        @enderror
    </div>

</div>


<div class="form-row mb-4">
    <div class="col d-flex">
        <label class="switch s-success mr-2">
            <input type="checkbox" id="checkbox_2" value="1" name="hot_deals">
            <span class="slider round"></span>
        </label>
        <label for="checkbox_2">Hot Deals</label>
        @error('hot_deals')
            <span class="text-danger"> {{$message}} </span>
        @enderror
    </div>
    <div class="col d-flex">
            <label class="switch s-success mr-2">
                <input type="checkbox" id="checkbox_3" value="1" name="featured">
                <span class="slider round"></span>
            </label>
            <label for="checkbox_3">Featured</label>

        @error('featured')
        <span class="text-danger"> {{$message}} </span>
    @enderror
    </div>

    <div class="col d-flex">
        <label class="switch s-success mr-2">
            <input type="checkbox" id="checkbox_4" value="1" name="special_offer">
            <span class="slider round"></span>
        </label>
        <label for="checkbox_4">Special Offer</label>

        @error('special_offer')
            <span class="text-danger"> {{$message}} </span>
        @enderror
    </div>
    <div class="col d-flex">

            <label class="switch s-success mr-2">
                <input type="checkbox" id="checkbox_5" value="1" name="special_deals">
                <span class="slider round"></span>
            </label>
            <label for="checkbox_5">Special Deals</label>

        @error('special_deals')
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
        tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
   });
      $(document).ready(function() {
        //   for sub category
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/admin/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subsubcategory_id"]').empty();

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

                //   for sub Sub category
                $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/admin/category/subsubcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subsubcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsub_category_name_en + '</option>');
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
<script type="text/javascript">
$(document).ready(function(){
    $('#product_thumb').change(function(e){
        let reader = new FileReader();
        reader.onload = function(e){

            $('#showThumbImg').removeClass('d-none');
            $('#showThumbImg').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files[0]);
    });

    // multi image

    $('#multi_img').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data

          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('mt-3 mr-2').attr('src', e.target.result) .width(50)
                  .height(50); //create image element
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });

      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });

});


</script>
@endsection


