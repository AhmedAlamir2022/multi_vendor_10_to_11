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
                        <h3><i class="far fa-user"></i>My Products</h3>
                        <div class="create_button">
                            <a href="{{ route('vendor.products.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                                Create Product</a>
                        </div>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="wsus__cart_list wishlist">
                                            <div class="table-responsive">
                                                <table>
                                                    <thead>
                                                        <tr class="d-flex">
                                                            <th class="wsus__pro_img">Image</th>
                                                            <th class="wsus__pro_img">Name</th>
                                                            <th class="wsus__pro_img">Price</th>
                                                            <th class="wsus__pro_img">Approved</th>
                                                            <th class="wsus__pro_img">Type</th>
                                                            <th class="wsus__pro_img">Status</th>
                                                            <th class="wsus__pro_name">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 0; ?>
                                                        @foreach ($products as $product)
                                                            <?php $i++; ?>
                                                            <tr class="d-flex"
                                                                style="
                                                                text-align: center;">
                                                                <td class="wsus__pro_img"><img width='70px'
                                                                        src='{{ asset($product->thumb_image) }}'></img></td>

                                                                <td class="wsus__pro_img">
                                                                    {{ $product->name }}
                                                                </td>

                                                                <td class="wsus__pro_img">
                                                                    {{ $product->price }}
                                                                </td>

                                                                <td class="wsus__pro_img">
                                                                    @if ($product->is_approved === 1)
                                                                        <i class="badge bg-success">Approved</i>
                                                                    @else
                                                                        <i class="badge bg-warning">Pending</i>
                                                                    @endif
                                                                </td>

                                                                <td class="wsus__pro_img">
                                                                    @switch($product->product_type)
                                                                        @case('new_arrival')
                                                                            <i class="badge bg-success">New Arrival</i>
                                                                        @break

                                                                        @case('featured_product')
                                                                            <i class="badge bg-warning">Featured Product</i>
                                                                        @break

                                                                        @case('top_product')
                                                                            <i class="badge bg-info">Top Product</i>
                                                                        @break

                                                                        @case('best_product')
                                                                            <i class="badge bg-danger">Best Product</i>
                                                                        @break

                                                                        @default
                                                                            <i class="badge bg-dark">None</i>
                                                                    @endswitch
                                                                </td>

                                                                <td class="wsus__pro_img">
                                                                    @if ($product->status == 1)
                                                                        <label class="custom-switch mt-2">
                                                                            <input type="checkbox" checked
                                                                                name="custom-switch-checkbox"
                                                                                data-id="{{ $product->id }}"
                                                                                class="custom-switch-input change-status">
                                                                            <span class="custom-switch-indicator"></span>
                                                                        </label>
                                                                    @else
                                                                        <label class="custom-switch mt-2">
                                                                            <input type="checkbox"
                                                                                name="custom-switch-checkbox"
                                                                                data-id="{{ $product->id }}"
                                                                                class="custom-switch-input change-status">
                                                                            <span class="custom-switch-indicator"></span>
                                                                        </label>
                                                                    @endif
                                                                </td>

                                                                <td class="wsus__pro_name">
                                                                    <a href="{{ route('vendor.products.edit', $product->id) }}"
                                                                        class='btn btn-primary'><i
                                                                            class='far fa-edit'></i></a>
                                                                    <a href="{{ route('vendor.products.destroy', $product->id) }}"
                                                                        class='btn btn-danger ml-2 delete-item'><i
                                                                            class='far fa-trash-alt'></i></a>
                                                                    <a href="{{ route('vendor.products-image-gallery.index', ['product' => $product->id]) }}"
                                                                        class='btn btn-primary'>Image Gallary</a>
                                                                    <a href="{{ route('vendor.products-variant.index', ['product' => $product->id]) }}"
                                                                        class='btn btn-danger ml-2'>Varients</a>

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

@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('vendor.product.change-status') }}",
                    method: 'PUT',
                    data: {
                        status: isChecked,
                        id: id
                    },
                    success: function(data) {
                        toastr.success(data.message)
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })

            })
        })
    </script>
@endpush
