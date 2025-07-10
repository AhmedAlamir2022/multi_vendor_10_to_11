@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Shipping Rule</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Shpping rules</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.shipping-rule.create') }}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i> Create New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Mini Cost</th>
                                            <th>Cost</th>
                                            <th>Status</th>
                                            <th>Updated Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($shipping_rules as $rule)
                                            <?php $i++; ?>
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $rule->name }}</td>
                                                <td>
                                                    @if ($rule->type === 'min_cost')
                                                        <i class="badge badge-primary">Minimum Order Amount</i>
                                                    @else
                                                        <i class="badge badge-success">Flate Amount</i>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($rule->type === 'min_cost')
                                                        {{ $currencyIcon . $rule->min_cost }}
                                                    @else
                                                        {{ $currencyIcon . '0' }}
                                                    @endif
                                                </td>
                                                <td>{{ $currencyIcon . $rule->cost }}
                                                </td>
                                                <td>
                                                    @if ($rule->status == 1)
                                                        <label class="custom-switch mt-2">
                                                            <input type="checkbox" checked name="custom-switch-checkbox"
                                                                data-id="{{ $rule->id }}"
                                                                class="custom-switch-input change-status">
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    @else
                                                        <label class="custom-switch mt-2">
                                                            <input type="checkbox" name="custom-switch-checkbox"
                                                                data-id="{{ $rule->id }}"
                                                                class="custom-switch-input change-status">
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    @endif
                                                </td>
                                                <td>{{ $rule->updated_at }}</td>
                                                <td>
                                                    <a href="{{ route('admin.shipping-rule.edit', $rule->id) }}"
                                                        class='btn btn-primary'><i class='far fa-edit'></i></a>
                                                    <a href="{{ route('admin.shipping-rule.destroy', $rule->id) }}"
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
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('admin.shipping-rule.change-status') }}",
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
