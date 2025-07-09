@extends('vendor.layouts.master')

@section('title')
    Vendor Dashboard || Product
@endsection

@section('content')
    <!--=============================
                                                                                                            DASHBOARD START
                                                                                                        ==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('vendor.layouts.sidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <a href="{{ route('vendor.products.index') }}" class="btn btn-warning mb-4"><i
                                class="fas fa-long-arrow-left"></i> Back</a>
                        <div class="dashboard_content mt-2 mt-md-0">
                            <h3><i class="fas fa-images"></i> Product: {{ $product->name }}</h3>
                            <div class="wsus__dashboard_profile">
                                <div class="wsus__dash_pro_area">
                                    <form action="{{ route('vendor.products-image-gallery.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group wsus__input">
                                            <label for="">Image <code>(Multiple image supported!)</code></label>
                                            <input type="file" name="image[]" class="form-control" multiple>
                                            <input type="hidden" name="product" value="{{ $product->id }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                        <div class="dashboard_content mt-2 mt-md-0">
                            <h3><i class="fas fa-images"></i></i> Product Images</h3>
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
                                                                <th class="wsus__pro_img">Image</th>
                                                                <th class="wsus__pro_name">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 0; ?>
                                                            @foreach ($product_image_gallery as $image)
                                                                <?php $i++; ?>
                                                                <tr class="d-flex" tyle="text-align: center;">
                                                                    <td class="wsus__pro_img">{{ $i }}</td>
                                                                    <td class="wsus__pro_img"><img width='100px'
                                                                            src='{{ asset($image->image) }}'></img>
                                                                    </td>
                                                                    <td class="wsus__pro_name">
                                                                        <a href="{{ route('vendor.products-image-gallery.destroy', $image->id) }}"
                                                                            class='btn btn-danger ml-2 delete-item'><i
                                                                                class='far fa-trash-alt'></i></a>
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
                                                                                                        =============================-->
@endsection


