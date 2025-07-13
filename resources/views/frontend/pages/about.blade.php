@extends('frontend.layouts.master')

@section('title')
    About Us || {{ $settings->site_name }}
@endsection

@section('content')
    <!--============================
                BREADCRUMB START
            ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>About</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><a href="javascript:;">About</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
                BREADCRUMB END
            ==============================-->


    <!--============================
                ABOUT PAGE START
            ==============================-->
    <section id="wsus__about_us">
        <div class="container">
            <div class="wsus__about_accordian">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        {!! @$about->content !!}
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <img src="{{ asset('uploads/media_677bb49984f45.jpg') }}" alt="img" class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </div>
        <div class="wsus__about_counter_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="wsus__about_counter_single">
                            <span class="counter">99,99</span>
                            <h2>product for sell</h2>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="wsus__about_counter_single">
                            <span class="counter">1,000</span>
                            <h2>community earnings</h2>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="wsus__about_counter_single">
                            <span class="counter">999</span>
                            <h2>growing buyers for sell</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wsus__why_shop">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h3>Why Shop With Us?</h3>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3">
                        <div class="wsus__why_shop_single">
                            <i class="fal fa-box-full"></i>
                            <p>Complete buyer supply store</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3">
                        <div class="wsus__why_shop_single">
                            <i class="fal fa-box-usd"></i>
                            <p>Same day dispatch on all orders</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3">
                        <div class="wsus__why_shop_single">
                            <i class="fal fa-truck"></i>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3">
                        <div class="wsus__why_shop_single">
                            <i class="fas fa-user-headset"></i>
                            <p>Professional advice and great support </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wsus__about_award">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h4>wining Awards</h4>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3">
                        <div class="wsus__about_award_single">
                            <img src="{{ asset('uploads/logo1.jpg') }}" alt="logo" class="img-fluid w-100">
                            <p>Winner Seo Master MAGT Smart Start Award 2025</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3">
                        <div class="wsus__about_award_single">
                            <img src="{{ asset('uploads/logo2.jpg') }}" alt="logo" class="img-fluid w-100">
                            <p>Winner Seo Master MAGT Smart Start Award 2025</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3">
                        <div class="wsus__about_award_single">
                            <img src="{{ asset('uploads/logo4.jpg') }}" alt="logo" class="img-fluid w-100">
                            <p>Winner Seo Master MAGT Smart Start Award 2025</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3">
                        <div class="wsus__about_award_single">
                            <img src="{{ asset('uploads/logo5.jpg') }}" alt="logo" class="img-fluid w-100">
                            <p>Winner Seo Master MAGT Smart Start Award 2025</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--============================
                PAYMENT PAGE END
            ==============================-->
@endsection
