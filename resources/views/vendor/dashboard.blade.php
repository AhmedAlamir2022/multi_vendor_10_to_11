@extends('vendor.layouts.master')
@section('title')
    Vendor Dashboard || Multi Vendor
@endsection
@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('vendor.layouts.sidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content">
                        <div class="wsus__dashboard">
                            <div class="row">
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Today's Orders</p>
                                        <h4 style="color:#ffff">44</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Td's Pending Orders</p>
                                        <h4 style="color:#ffff">44</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Total Orders</p>
                                        <h4 style="color:#ffff">44</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Total Pending Orders</p>
                                        <h4 style="color:#ffff">44</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Completed Orders</p>
                                        <h4 style="color:#ffff">44</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Total Products</p>
                                        <h4 style="color:#ffff">44</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="javascript:;">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Todays Earnings</p>
                                        <h4 style="color:#ffff">44</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="javascript:;">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>This Months Earnings</p>
                                        <h4 style="color:#ffff">44</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="javascript:;">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>This Year Earnings</p>
                                        <h4 style="color:#ffff">44</h4>
                                    </a>
                                </div>

                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="javascript:;">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Total Earnings</p>
                                        <h4 style="color:#ffff">44</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Total Reviews</p>
                                        <h4 style="color:#ffff">44</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="">
                                        <i class="fas fa-user-shield"></i>
                                        <p>shop profile</p>
                                        <h4 style="color:#ffff">44</h4>
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
