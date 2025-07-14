<section id="wsus__hot_deals" class="wsus__hot_deals_2">
    <div class="container">

        <div class="wsus__hot_large_item">
            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__section_header justify-content-start">
                        <div class="monthly_top_filter2 mb-1">
                            <button class="active auto_click" data-filter=".new_arrival">New Arrival</button>
                            <button data-filter=".featured_product">Featured</button>
                            <button data-filter=".top_product">Top Product</button>
                            <button data-filter=".best_product">Best Product</button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row grid2">
                @foreach ($typeBaseProducts as $key => $products)
                    @foreach ($products as $product)
                        <x-product-card :product="$product" :key="$key" />
                    @endforeach
                @endforeach

            </div>
        </div>



        <section id="wsus__single_banner" class="home_2_single_banner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        @if ($homepage_secion_banner_three->banner_one->status == 1)
                            <div class="wsus__single_banner_content banner_1">
                                <div class="wsus__single_banner_img">
                                    <img src="{{ asset($homepage_secion_banner_three->banner_one->banner_image) }}"
                                        alt="banner" class="img-fluid w-100">
                                </div>
                                <div class="wsus__single_banner_text">
                                    <h6>sell on <span>42% off</span></h6>
                                    <h3>winter collection</h3>
                                    <a class="shop_btn"
                                        href="{{ $homepage_secion_banner_three->banner_one->banner_url }}">shop now</a>
                                </div>
                            </div>
                        @endif
                    </div>
                    {{-- <div class="col-xl-6 col-lg-6">
                        @if ($homepage_secion_banner_three->banner_one->status == 1)
                            <div class="wsus__single_banner_content banner_1">
                                <a href="{{ $homepage_secion_banner_three->banner_one->banner_url }}">
                                    <img class="img-gluid"
                                        src="{{ asset($homepage_secion_banner_three->banner_one->banner_image) }}"
                                        alt="">
                                </a>
                            </div>
                        @endif
                    </div> --}}
                    <div class="col-xl-6 col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                @if ($homepage_secion_banner_three->banner_two->status == 1)
                                    <div class="wsus__single_banner_content single_banner_2">
                                        <div class="wsus__single_banner_img">
                                            <img src="{{ asset($homepage_secion_banner_three->banner_two->banner_image) }}"
                                                alt="banner" class="img-fluid w-100">
                                        </div>
                                        <div class="wsus__single_banner_text">
                                            <h6>New Collection</h6>
                                            <h3>kid's fashion</h3>
                                            <a class="shop_btn"
                                                href="{{ $homepage_secion_banner_three->banner_two->banner_url }}">shop
                                                now</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            {{-- <div class="col-12">
                                @if ($homepage_secion_banner_three->banner_two->status == 1)
                                    <div class="wsus__single_banner_content single_banner_2">
                                        <a href="{{ $homepage_secion_banner_three->banner_two->banner_url }}">
                                            <img class="img-gluid"
                                                src="{{ asset($homepage_secion_banner_three->banner_two->banner_image) }}"
                                                alt="">
                                        </a>
                                    </div>
                                @endif
                            </div> --}}
                            <div class="col-12 mt-lg-4">
                                <div class="wsus__single_banner_content">
                                    @if ($homepage_secion_banner_three->banner_three->status == 1)
                                        <div class="wsus__single_banner_img">
                                            <img src="{{ asset($homepage_secion_banner_three->banner_three->banner_image) }}"
                                                alt="banner" class="img-fluid w-100">
                                        </div>
                                        <div class="wsus__single_banner_text">
                                            <h6>sell on <span>35% off</span></h6>
                                            <h3>smart watches</h3>
                                            <a class="shop_btn"
                                                href="{{ $homepage_secion_banner_three->banner_three->banner_url }}">shop
                                                now</a>
                                        </div>
                                </div>
                                @endif
                            </div>
                            {{-- <div class="col-12 mt-lg-4">
                                <div class="wsus__single_banner_content">
                                    @if ($homepage_secion_banner_three->banner_three->status == 1)
                                        <a href="{{ $homepage_secion_banner_three->banner_three->banner_url }}">
                                            <img class="img-gluid"
                                                src="{{ asset($homepage_secion_banner_three->banner_three->banner_image) }}"
                                                alt="">
                                        </a>
                                    @endif

                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
