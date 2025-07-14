@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Withdraw Methods</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Methods</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.withdraw-method.create') }}" class="btn btn-primary"><i
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
                                            <th>Min Amount</th>
                                            <th>Max Amount</th>
                                            <th>Withdraw Charge</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($withdrawsMethods as $method)
                                            <?php $i++; ?>
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $method->name }}</td>
                                                <td>{{ $method->minimum_amount }}</td>
                                                <td>{{ $method->maximum_amount }}</td>
                                                <td>{{ $method->withdraw_charge . '%' }}</td>
                                                <td>
                                                    <a href="{{ route('admin.withdraw-method.edit', $method->id) }}"
                                                        class='btn btn-primary'><i class='far fa-edit'></i></a>
                                                    <a href="{{ route('admin.withdraw-method.destroy', $method->id) }}"
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
