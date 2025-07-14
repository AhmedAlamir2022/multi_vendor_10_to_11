<section id="wsus__single_banner" class="wsus__single_banner_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                @if ($homepage_secion_banner_two->banner_one->status == 1)
                    <div class="wsus__single_banner_content single_banner_2">
                        <div class="wsus__single_banner_img">
                            <a href="{{ $homepage_secion_banner_two->banner_one->banner_url }}">
                                <img src="{{ asset($homepage_secion_banner_two->banner_one->banner_image) }}"
                                    alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>New Collection</h6>
                            <h3>Laptops</h3>
                            <a class="shop_btn" href="{{ $homepage_secion_banner_two->banner_one->banner_url }}">shop
                                now</a>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-xl-6 col-lg-6">
                @if ($homepage_secion_banner_two->banner_two->status == 1)
                    <div class="wsus__single_banner_content">
                        <div class="wsus__single_banner_img">
                            <img src="{{ asset($homepage_secion_banner_two->banner_two->banner_image) }}" alt="banner"
                                class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>sell on <span>35% off</span></h6>
                            <h3>smart watch</h3>
                            <a class="shop_btn" href="{{ $homepage_secion_banner_two->banner_two->banner_url }}">shop
                                now</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
