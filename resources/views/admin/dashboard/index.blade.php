@extends('admin.body.app')

@section('title','Admin Dashboard')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
{{-- <li class="breadcrumb-item active" aria-current="page"><span>Sales</span></li> --}}
@endsection
@section('content')


<div class="row layout-top-spacing">

    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget-two">
            <div class="widget-content">
                <div class="w-numeric-value">
                    <div class="w-content">
                        <span class="w-value">Daily sales</span>
                        <span class="w-numeric-title">Go to columns for details.</span>
                    </div>
                    <div class="w-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                    </div>
                </div>
                <div class="w-chart">
                    <div id="daily-sales"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget widget-three">
            <div class="widget-heading">
                <h5 class="">Summary</h5>

                <div class="task-action">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask" style="will-change: transform;">
                            <a class="dropdown-item" href="javascript:void(0);">View Report</a>
                            <a class="dropdown-item" href="javascript:void(0);">Edit Report</a>
                            <a class="dropdown-item" href="javascript:void(0);">Mark as Done</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="widget-content">

                <div class="order-summary">

                    <div class="summary-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                        </div>
                        <div class="w-summary-details">

                            <div class="w-summary-info">
                                <h6>Income</h6>
                                <p class="summary-count">$92,600</p>
                            </div>

                            <div class="w-summary-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="summary-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>
                        </div>
                        <div class="w-summary-details">

                            <div class="w-summary-info">
                                <h6>Profit</h6>
                                <p class="summary-count">$37,515</p>
                            </div>

                            <div class="w-summary-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="summary-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                        </div>
                        <div class="w-summary-details">

                            <div class="w-summary-info">
                                <h6>Expenses</h6>
                                <p class="summary-count">$55,085</p>
                            </div>

                            <div class="w-summary-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>



    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget-one widget">
            <div class="widget-content">
                <div class="w-numeric-value">
                    <div class="w-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    </div>
                    <div class="w-content">
                        <span class="w-value">3,192</span>
                        <span class="w-numeric-title">Total Orders</span>
                    </div>
                </div>
                <div class="w-chart">
                    <div id="total-orders"></div>
                </div>
            </div>
        </div>
    </div>




    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-table-two">

            <div class="widget-heading">
                <h5 class="">Recent Orders</h5>
            </div>

            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><div class="th-content">Customer</div></th>
                                <th><div class="th-content">Product</div></th>
                                <th><div class="th-content">Invoice</div></th>
                                <th><div class="th-content th-heading">Price</div></th>
                                <th><div class="th-content">Status</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><div class="td-content customer-name"><img src="assets/img/profile-13.jpg" alt="avatar"><span>Luke Ivory</span></div></td>
                                <td><div class="td-content product-brand text-primary">Headphone</div></td>
                                <td><div class="td-content product-invoice">#46894</div></td>
                                <td><div class="td-content pricing"><span class="">$56.07</span></div></td>
                                <td><div class="td-content"><span class="badge badge-success">Paid</span></div></td>
                            </tr>

                            <tr>
                                <td><div class="td-content customer-name"><img src="assets/img/profile-7.jpg" alt="avatar"><span>Andy King</span></div></td>
                                <td><div class="td-content product-brand text-warning">Nike Sport</div></td>
                                <td><div class="td-content product-invoice">#76894</div></td>
                                <td><div class="td-content pricing"><span class="">$88.00</span></div></td>
                                <td><div class="td-content"><span class="badge badge-primary">Shipped</span></div></td>
                            </tr>
                            <tr>
                                <td><div class="td-content customer-name"><img src="assets/img/profile-10.jpg" alt="avatar"><span>Laurie Fox</span></div></td>
                                <td><div class="td-content product-brand text-danger">Sunglasses</div></td>
                                <td><div class="td-content product-invoice">#66894</div></td>
                                <td><div class="td-content pricing"><span class="">$126.04</span></div></td>
                                <td><div class="td-content"><span class="badge badge-success">Paid</span></div></td>
                            </tr>
                            <tr>
                                <td><div class="td-content customer-name"><img src="assets/img/profile-5.jpg" alt="avatar"><span>Ryan Collins</span></div></td>
                                <td><div class="td-content product-brand text-warning">Sport</div></td>
                                <td><div class="td-content product-invoice">#89891</div></td>
                                <td><div class="td-content pricing"><span class="">$108.09</span></div></td>
                                <td><div class="td-content"><span class="badge badge-primary">Shipped</span></div></td>
                            </tr>
                            <tr>
                                <td><div class="td-content customer-name"><img src="assets/img/profile-4.jpg" alt="avatar"><span>Irene Collins</span></div></td>
                                <td><div class="td-content product-brand text-primary">Speakers</div></td>
                                <td><div class="td-content product-invoice">#75844</div></td>
                                <td><div class="td-content pricing"><span class="">$84.00</span></div></td>
                                <td><div class="td-content"><span class="badge badge-danger">Pending</span></div></td>
                            </tr>
                            <tr>
                                <td><div class="td-content customer-name"><img src="assets/img/profile-11.jpg" alt="avatar"><span>Sonia Shaw</span></div></td>
                                <td><div class="td-content product-brand text-danger">Watch</div></td>
                                <td><div class="td-content product-invoice">#76844</div></td>
                                <td><div class="td-content pricing"><span class="">$110.00</span></div></td>
                                <td><div class="td-content"><span class="badge badge-success">Paid</span></div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-table-three">

            <div class="widget-heading">
                <h5 class="">Top Selling Product</h5>
            </div>

            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-scroll">
                        <thead>
                            <tr>
                                <th><div class="th-content">Product</div></th>
                                <th><div class="th-content th-heading">Price</div></th>
                                <th><div class="th-content th-heading">Discount</div></th>
                                <th><div class="th-content">Sold</div></th>
                                <th><div class="th-content">Source</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><div class="td-content product-name"><img src="assets/img/product-headphones.jpg" alt="product"><div class="align-self-center"><p class="prd-name">Headphone</p><p class="prd-category text-primary">Digital</p></div></div></td>
                                <td><div class="td-content"><span class="pricing">$168.09</span></div></td>
                                <td><div class="td-content"><span class="discount-pricing">$60.09</span></div></td>
                                <td><div class="td-content">170</div></td>
                                <td><div class="td-content"><a href="javascript:void(0);" class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg> Direct</a></div></td>
                            </tr>
                            <tr>
                                <td><div class="td-content product-name"><img src="assets/img/product-shoes.jpg" alt="product"><div class="align-self-center"><p class="prd-name">Shoes</p><p class="prd-category text-warning">Faishon</p></div></div></td>
                                <td><div class="td-content"><span class="pricing">$108.09</span></div></td>
                                <td><div class="td-content"><span class="discount-pricing">$47.09</span></div></td>
                                <td><div class="td-content">130</div></td>
                                <td><div class="td-content"><a href="javascript:void(0);" class="text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg> Google</a></div></td>
                            </tr>
                            <tr>
                                <td><div class="td-content product-name"><img src="assets/img/product-watch.jpg" alt="product"><div class="align-self-center"><p class="prd-name">Watch</p><p class="prd-category text-danger">Accessories</p></div></div></td>
                                <td><div class="td-content"><span class="pricing">$88.00</span></div></td>
                                <td><div class="td-content"><span class="discount-pricing">$20.00</span></div></td>
                                <td><div class="td-content">66</div></td>
                                <td><div class="td-content"><a href="javascript:void(0);" class="text-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg> Ads</a></div></td>
                            </tr>
                            <tr>
                                <td><div class="td-content product-name"><img src="assets/img/product-laptop.jpg" alt="product"><div class="align-self-center"><p class="prd-name">Laptop</p><p class="prd-category text-primary">Digital</p></div></div></td>
                                <td><div class="td-content"><span class="pricing">$110.00</span></div></td>
                                <td><div class="td-content"><span class="discount-pricing">$33.00</span></div></td>
                                <td><div class="td-content">35</div></td>
                                <td><div class="td-content"><a href="javascript:void(0);" class="text-info"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg> Email</a></div></td>
                            </tr>
                            <tr>
                                <td><div class="td-content product-name"><img src="assets/img/product-camera.jpg" alt="product"><div class="align-self-center"><p class="prd-name">Camera</p><p class="prd-category text-primary">Digital</p></div></div></td>
                                <td><div class="td-content"><span class="pricing">$126.04</span></div></td>
                                <td><div class="td-content"><span class="discount-pricing">$26.04</span></div></td>
                                <td><div class="td-content">30</div></td>
                                <td><div class="td-content"><a href="javascript:void(0);" class="text-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg> Referral</a></div></td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</div>


@endsection
