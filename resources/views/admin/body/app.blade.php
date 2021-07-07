<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Advance Ecommerce | @yield('title') </title>
    <link rel="icon" type="image/x-icon" href="{{asset('backend/assets/img/advecom.png')}}"/>
    <link href="{{asset('backend')}}/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="{{asset('backend')}}/assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('backend')}}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend')}}/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{asset('backend')}}/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="{{asset('backend')}}/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{asset('backend')}}/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="{{asset('backend')}}/plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('backend')}}/plugins/table/datatable/custom_dt_custom.css">

    {{-- sweet alert --}}
    {{-- <link href="{{asset('backend')}}/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" /> --}}
    <link href="{{asset('backend')}}/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend')}}/assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    {{-- sweet alert --}}
@yield('style')
<style>
    #sidebar ul.menu-categories ul.submenu > li a.dropdown-toggle {
    padding: 10px 15px 10px 10px;
}

#sidebar ul.menu-categories li.menu ul.submenu > li a:before {
  left: 0px !important;
}
    .toast-success{
        background-color:#1abc9c !important;
    }
</style>
</head>
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
@include('admin.body.topbar')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
@include('admin.body.sidebar')
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

              @yield('content')

            </div>

        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('backend')}}/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="{{asset('backend')}}/bootstrap/js/popper.min.js"></script>
    <script src="{{asset('backend')}}/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{asset('backend')}}/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{asset('backend')}}/assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{asset('backend')}}/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{asset('backend')}}/plugins/apex/apexcharts.min.js"></script>
    <script src="{{asset('backend')}}/assets/js/dashboard/dash_1.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- sweetalert --}}
<script src="{{asset('backend')}}/plugins/sweetalerts/sweetalert2.min.js"></script>
<script src="{{asset('backend')}}/plugins/sweetalerts/custom-sweetalert.js"></script>
{{-- sweetalert --}}
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('backend')}}/plugins/table/datatable/datatables.js"></script>
    <script>

$(document).on('click','#delete', function (e) {
    e.preventDefault();
    let link = $(this).attr('href');
  swal({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Delete',
      padding: '2em'
    }).then(function(result) {
      if (result.value) {
          window.location.href= link;
        swal(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })
})
    </script>
    <script>
          toastr.options.timeOut = 1500;
             toastr.options.progressBar = true;
          @if(Session::has('message'))
          var type = "{{ Session::get('alert-type','info') }}"
          switch(type){
             case 'info':
             toastr.info(" {{ Session::get('message') }} ");
             break;

             case 'success':
             toastr.success(" {{ Session::get('message') }} ");

             break;

             case 'warning':
             toastr.warning(" {{ Session::get('message') }} ");
             break;

             case 'error':
             toastr.error(" {{ Session::get('message') }} ");
             break;
          }
          @endif
         </script>
         <script>
                $(document).ready(function() {
            App.init();
        });
                     c3 = $('#style-3').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50,100],
            "pageLength": 5
        });
        multiCheck(c3);
         </script>
@yield('script')
</body>


</html>
