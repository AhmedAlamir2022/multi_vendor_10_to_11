@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Flash Sale Products</h1>
        </div>

        < class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Flash Sale End Date</h4>
                            <div class="card-body">
                                <form action="{{ route('admin.flash-sale.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="">
                                        <div class="form-group">
                                            <label>Sale End Date</label>
                                            <input type="text" class="form-control datepicker" name="end_date"
                                                value="{{ @$flashSaleDate->end_date }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Add Flash Sale Products</h4>

                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.flash-sale.add-product') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Add Product</label>
                                        <select name="product" id="" class="form-control select2">
                                            <option value="">Select</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Show at home?</label>
                                                <select name="show_at_home" id="" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" id="" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Flash Sale Products</h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-2">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Show At Home</th>
                                                <th>Status</th>
                                                <th>Updated Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($falshSaleItems as $falshSaleItem)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td><a
                                                            href='{{ route('admin.products.edit', $falshSaleItem->product->id) }}'>
                                                            {{ $falshSaleItem->product->name }}</a>
                                                    </td>
                                                    <td>
                                                        @if ($falshSaleItem->show_at_home == 1)
                                                            <label class="custom-switch mt-2">
                                                                <input type="checkbox" checked name="custom-switch-checkbox"
                                                                    data-id="{{ $falshSaleItem->id }}"
                                                                    class="custom-switch-input change-status">
                                                                <span class="custom-switch-indicator"></span>
                                                            </label>
                                                        @else
                                                            <label class="custom-switch mt-2">
                                                                <input type="checkbox" name="custom-switch-checkbox"
                                                                    data-id="{{ $falshSaleItem->id }}"
                                                                    class="custom-switch-input change-status">
                                                                <span class="custom-switch-indicator"></span>
                                                            </label>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($falshSaleItem->status == 1)
                                                            <label class="custom-switch mt-2">
                                                                <input type="checkbox" checked name="custom-switch-checkbox"
                                                                    data-id="{{ $falshSaleItem->id }}"
                                                                    class="custom-switch-input change-status">
                                                                <span class="custom-switch-indicator"></span>
                                                            </label>
                                                        @else
                                                            <label class="custom-switch mt-2">
                                                                <input type="checkbox" name="custom-switch-checkbox"
                                                                    data-id="{{ $falshSaleItem->id }}"
                                                                    class="custom-switch-input change-status">
                                                                <span class="custom-switch-indicator"></span>
                                                            </label>
                                                        @endif
                                                    </td>
                                                    <td>{{ $falshSaleItem->updated_at }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.flash-sale.destroy', $falshSaleItem->id) }}"
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
    </section>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('admin.category.change-status') }}",
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
