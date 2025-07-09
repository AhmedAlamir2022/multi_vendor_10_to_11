@extends('vendor.layouts.master')

@section('title')
    Vendor Dashboard || Product Variants
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
                        <h3><i class="far fa-user"></i>Product Variants</h3>
                        <h6>Product: {{ $product->name }}</h6>
                        <div class="create_button">
                            <a href="{{ route('vendor.products-variant.create', ['product' => $product->id]) }}"
                                class="btn btn-primary"><i class="fas fa-plus"></i> Create Variant</a>
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
                                                            <th class="wsus__pro_img">#</th>
                                                            <th class="wsus__pro_img">Name</th>
                                                            <th class="wsus__pro_img">Status</th>
                                                            <th class="wsus__pro_name">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 0; ?>
                                                        @foreach ($product_variants as $product)
                                                            <?php $i++; ?>
                                                            <tr class="d-flex"
                                                                style="
                                                                text-align: center;">

                                                                <td class="wsus__pro_img">
                                                                    {{ $i }}
                                                                </td>

                                                                <td class="wsus__pro_img">
                                                                    {{ $product->name }}
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
                                                                    <a href='{{ route('vendor.products-variant-item.index', ['productId' => request()->product, 'variantId' => $product->id]) }}' class='btn btn-info btn-space-right'><i class='far fa-edit'></i> Variant Items</a>
                                                                    <a href="{{ route('vendor.products-variant.edit', $product->id) }}"
                                                                        class='btn btn-primary'><i
                                                                            class='far fa-edit'></i></a>
                                                                    <a href="{{ route('vendor.products-variant.destroy', $product->id) }}"
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
                                                                                            ==============================-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('vendor.products-variant.change-status') }}",
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
