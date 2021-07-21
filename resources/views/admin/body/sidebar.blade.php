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
<a href="#category" data-active="{{($route=='category.all') || ($route=='category.create') || ($route=='category.edit') || ($route=='subcategory.all') || ($route=='subcategory.create') || ($route=='subcategory.edit') || ($route=='subsubcategory.all') || ($route=='subsubcategory.create') || ($route=='subsubcategory.edit')  ? 'true' : ' ' }}"
data-toggle="collapse"
aria-expanded="{{($route=='category.all') || ($route=='category.create') || ($route=='category.edit') || ($route=='subcategory.all') || ($route=='subcategory.create') || ($route=='subcategory.edit')  || ($route=='subsubcategory.all') || ($route=='subsubcategory.create') || ($route=='subsubcategory.edit') ? 'true' :''}}" class="dropdown-toggle collapse">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                        <span> Category</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="submenu list-unstyled collapse  {{($route=='category.all') || ($route=='category.create') || ($route=='category.edit') || ($route=='subcategory.all') || ($route=='subcategory.create') ? 'show' :''}}  " id="category" data-parent="#accordionExample" style="">

                    <li>
                        <a href="#sm2" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"> Parent Category <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        <ul class="list-unstyled sub-submenu collapse {{($route=='category.all') || ($route=='category.create') || ($route=='category.edit')  ? 'show' :''}} " id="sm2" data-parent="#category" style="">
                            <li>
                                <a class="{{($route=='category.all') ? 'hover_color' :''}} " href="{{route('category.all')}}"> Category </a>
                            </li>
                            <li>
                                <a class="{{($route=='category.create') ? 'hover_color' :''}} " href="{{route('category.create')}}"> Create </a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a href="#sub" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"> Sub Category <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        <ul class="list-unstyled sub-submenu collapse {{($route=='subcategory.all') || ($route=='subcategory.create') || ($route=='subcategory.edit')  ? 'show' :''}}  " id="sub" data-parent="#category" style="">
                            <li>
                                <a class="{{($route=='subcategory.all') ? 'hover_color' :''}} " href="{{route('subcategory.all')}}">Sub Category </a>
                            </li>
                            <li>
                                <a class="{{($route=='subcategory.create') ? 'hover_color' :''}} " href="{{route('subcategory.create')}}"> Create Sub</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a href="#subsub" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"> sub>subCategory <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        <ul class="list-unstyled sub-submenu collapse  {{($route=='subsubcategory.all') || ($route=='subsubcategory.create') || ($route=='subsubcategory.edit')  ? 'show' :''}}  " id="subsub" data-parent="#category" style="">
                            <li>
                                <a class="{{($route=='subsubcategory.all') ? 'hover_color' :''}} " href="{{route('subsubcategory.all')}}">Sub Sub Category </a>
                            </li>
                            <li>
                                <a class="{{($route=='subsubcategory.create') ? 'hover_color' :''}} " href="{{route('subsubcategory.create')}}"> Create </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>

{{-- product  --}}
<li class="menu">
    <a href="#product" data-active="{{($route=='product.all') || ($route=='product.create')  || ($route=='product.edit') ? 'true' :''}}" data-toggle="collapse" aria-expanded="{{($route=='product.all') || ($route=='product.create')  || ($route=='product.edit') ? 'true' :''}}" class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive"><polyline points="21 8 21 21 3 21 3 8"></polyline><rect x="1" y="3" width="22" height="5"></rect><line x1="10" y1="12" x2="14" y2="12"></line></svg>
            <span>Products</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="submenu list-unstyled collapse" id="product" data-parent="#product">
        <li class="active">
            <a href="{{route('product.all')}}"> All Products </a>
        </li>
        <li>
            <a href="{{route('product.create')}}"> Create Products </a>
        </li>
    </ul>
</li>
{{-- product  --}}


{{-- Slider  --}}
<li class="menu">
    <a href="#slider" data-active="{{($route=='slider.all') || ($route=='slider.create')  || ($route=='slider.edit') ? 'true' :''}}" data-toggle="collapse" aria-expanded="{{($route=='slider.all') || ($route=='slider.create')  || ($route=='slider.edit') ? 'true' :''}}" class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>
            <span>Sliders</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="submenu list-unstyled collapse {{($route=='slider.all') || ($route=='slider.create')  || ($route=='slider.edit') ? 'show' :''}}" id="slider" data-parent="#product">
        <li class="{{($route=='slider.all') ? 'active' :''}}">
            <a href="{{route('slider.all')}}"> All Sliders </a>
        </li>
        <li class="{{($route=='slider.create') || ($route=='slider.create')  || ($route=='slider.edit') ? 'active' :''}}">
            <a href="{{route('slider.create')}}"> Create Sliders </a>
        </li>
    </ul>
</li>
{{-- Slider  --}}


{{-- Coupon  --}}
<li class="menu">
    <a href="#coupon" data-active="{{($route=='coupon.all') || ($route=='coupon.create')  || ($route=='coupon.edit') ? 'true' :''}}" data-toggle="collapse" aria-expanded="{{($route=='coupon.all') || ($route=='coupon.create')  || ($route=='coupon.edit') ? 'true' :''}}" class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-scissors"><circle cx="6" cy="6" r="3"></circle><circle cx="6" cy="18" r="3"></circle><line x1="20" y1="4" x2="8.12" y2="15.88"></line><line x1="14.47" y1="14.48" x2="20" y2="20"></line><line x1="8.12" y1="8.12" x2="12" y2="12"></line></svg>
            <span>Coupon</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="submenu list-unstyled collapse {{($route=='coupon.all') || ($route=='coupon.create')  || ($route=='coupon.edit') ? 'show' :''}}" id="coupon" data-parent="#product">
        <li class="{{($route=='coupon.all') ? 'active' :''}}">
            <a href="{{route('coupon.all')}}"> All Coupons </a>
        </li>
        <li class="{{($route=='coupon.create') || ($route=='coupon.create')  || ($route=='coupon.edit') ? 'active' :''}}">
            <a href="{{route('coupon.create')}}"> Create Coupon </a>
        </li>
    </ul>
</li>
{{-- Coupon  --}}

{{-- Shipping Area  --}}
<li class="menu">
    <a href="#shipping" data-active="{{($route=='division.all') || ($route=='division.edit') || ($route=='district.all') || ($route=='district.edit') || ($route=='state.all') || ($route=='state.edit') ? 'true' :''}}" data-toggle="collapse" aria-expanded="{{($route=='division.all') || ($route=='division.edit')  || ($route=='district.all') || ($route=='district.edit') || ($route=='state.all') || ($route=='state.edit') ? 'true' :''}}" class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-gift"><polyline points="20 12 20 22 4 22 4 12"></polyline><rect x="2" y="7" width="20" height="5"></rect><line x1="12" y1="22" x2="12" y2="7"></line><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path></svg>
            <span>Shipping</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="submenu list-unstyled collapse {{($route=='division.all') || ($route=='division.edit') || ($route=='state.all') || ($route=='state.edit') || ($route=='district.all') || ($route=='district.edit') ? 'show' :''}}" id="shipping" data-parent="#product">
        <li class="{{($route=='division.all') ? 'active' :''}}">
            <a href="{{route('division.all')}}"> Divisions </a>
        </li>

        <li class="{{($route=='district.all') ? 'active' :''}}">
            <a href="{{route('district.all')}}"> District </a>
        </li>

        <li class="{{($route=='state.all') ? 'active' :''}}">
            <a href="{{route('state.all')}}"> State </a>
        </li>

    </ul>
</li>
{{-- Shipping Area  --}}



{{--- Blog System  ---}}
<li class="menu">
    <a href="#blog" data-active="{{($route=='blogcat.all') || ($route=='blogcat.edit')  || ($route=='blogpost.all') || ($route=='blogpost.edit') ? 'true' :''}}" data-toggle="collapse" aria-expanded="{{($route=='blogcat.all') || ($route=='blogcat.edit')  || ($route=='blogpost.all') || ($route=='blogpost.edit') ? 'true' :''}}" class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
            <span>Blog System </span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="submenu list-unstyled collapse {{($route=='blogcat.all') || ($route=='blogcat.edit') || ($route=='blogpost.all') || ($route=='blogpost.edit') ? 'show' :''}}" id="blog" data-parent="#blog">

        <li class="{{($route=='blogcat.all') ? 'active' :''}}">
            <a href="{{route('blogcat.all')}}"> Categories </a>
        </li>
        <li class="{{($route=='blogpost.all') ? 'active' :''}}">
            <a href="{{route('blogpost.all')}}"> All Posts </a>
        </li>

    </ul>
</li>
{{-- Blog System   --}}




{{--- Website Setup ---}}
<li class="menu">
    <a href="#appearance" data-active="{{($route=='appearance.all') ? 'true' :''}}" data-toggle="collapse" aria-expanded="{{($route=='appearance.all') ? 'true' :''}}" class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
            <span>Website Setup </span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="submenu list-unstyled collapse {{($route=='appearance.all') ? 'show' :''}}" id="appearance" data-parent="#appearance">

        <li class="{{($route=='appearance.all') ? 'active' :''}}">
            <a href="{{route('appearance.all')}}"> Appearance </a>
        </li>


    </ul>
</li>
{{-- Website Setup   --}}


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
