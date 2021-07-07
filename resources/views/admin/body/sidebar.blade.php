@php
    $prefixed =Request::route()->getPrefix();
    $route = Route::current()->getName();

@endphp
{{-- @dd($route) --}}
<div class="sidebar-wrapper sidebar-theme">


    <nav id="sidebar">
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="{{route('admin.dashboard')}}" data-active="{{($route=='admin.dashboard') ? 'true' :''}}"  aria-expanded="{{($route=='admin.dashboard') ? 'true' :''}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#brand" data-active="{{($route=='brand.all') || ($route=='brand.create') ? 'true' :''}}" data-toggle="collapse" aria-expanded="{{($route=='brand.all') || ($route=='brand.create') ? 'true' :''}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        <span>Brands</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="submenu list-unstyled collapse" id="brand" data-parent="#brand">
                    <li class="active">
                        <a href="{{route('brand.all')}}"> Brands </a>
                    </li>
                    <li>
                        <a href="{{route('brand.create')}}"> Create Brand </a>
                    </li>
                </ul>
            </li>


            <li class="menu">
                <a href="#category" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                        <span> Category</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="submenu list-unstyled collapse" id="category" data-parent="#accordionExample" style="">

                    <li>
                        <a href="#sm2" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"> Parent Category <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        <ul class="list-unstyled sub-submenu collapse " id="sm2" data-parent="#category" style="">
                            <li>
                                <a href="{{route('category.all')}}"> Category </a>
                            </li>
                            <li>
                                <a href="{{route('category.create')}}"> Create </a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a href="#sub" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"> Sub Category <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        <ul class="list-unstyled sub-submenu collapse " id="sub" data-parent="#category" style="">
                            <li>
                                <a href="{{route('category.all')}}"> Category </a>
                            </li>
                            <li>
                                <a href="{{route('category.create')}}"> Create </a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a href="#subsub" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"> sub>subCategory <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        <ul class="list-unstyled sub-submenu collapse " id="subsub" data-parent="#category" style="">
                            <li>
                                <a href="{{route('category.all')}}"> Category </a>
                            </li>
                            <li>
                                <a href="{{route('category.create')}}"> Create </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>


            <li class="menu">
                <a target="_blank" href="https://designreset.com/cork/documentation/index.html" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                        <span>Documentation</span>
                    </div>
                </a>
            </li>

        </ul>
        <!-- <div class="shadow-bottom"></div> -->

    </nav>

</div>
