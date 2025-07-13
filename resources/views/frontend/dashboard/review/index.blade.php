@extends('frontend.dashboard.layouts.master')

@section('title')
    My Reviews || {{ $settings->site_name }}
@endsection

@section('content')
    <!--=============================
                    DASHBOARD START
                  ==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('frontend.dashboard.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> All Reviews</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="wsus__cart_list wishlist">
                                            <div class="table-responsive">
                                                <table>
                                                    <thead>
                                                        <tr class="d-flex">
                                                            <th class="wsus__pro_img">#</th>
                                                            <th class="wsus__pro_name">Product</th>
                                                            <th class="wsus__pro_img">User</th>
                                                            <th class="wsus__pro_img">Rating</th>
                                                            <th class="wsus__pro_img">Review</th>
                                                            <th class="wsus__pro_img">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 0; ?>
                                                        @foreach ($reviews as $review)
                                                            <?php $i++; ?>
                                                            <tr class="d-flex"
                                                                style="
                                                                text-align: center;">
                                                                <td class="wsus__pro_img">{{ $i }}</td>
                                                                <td class="wsus__pro_name"><a
                                                                        href="{{ route('product-detail', $review->product->slug) }}">
                                                                        {{ $review->product->name }}
                                                                    </a></td>

                                                                <td class="wsus__pro_img">
                                                                    {{ $review->user->name }}
                                                                </td>

                                                                <td class="wsus__pro_img">
                                                                    {{ $review->rating }}
                                                                </td>

                                                                <td class="wsus__pro_img">
                                                                    {{ $review->review }}
                                                                </td>

                                                                <td class="wsus__pro_img">
                                                                    @if ($review->status == 1)
                                                                        <span class='badge bg-success'>Approved</span>
                                                                    @else
                                                                        <span class='badge bg-waring'>Pending</span>
                                                                    @endif
                                                                </td>


                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                    DASHBOARD START
                  ==============================-->
@endsection
