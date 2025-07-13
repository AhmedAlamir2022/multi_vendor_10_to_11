@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Pending Vendor Requests</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All requests</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Shop Name</th>
                                            <th>Email</th>
                                            <th>Vendor Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($vendor_requests as $request)
                                            <?php $i++; ?>
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $request->name }}</i></td>
                                                <td>{{ $request->shop_name }}</td>
                                                <td>{{ $request->email }}</td>
                                                <td>
                                                    @if ($request->vendor_status == 0)
                                                        <span class='badge bg-warning'>pending</span>
                                                    @else
                                                        <span class='badge bg-success'>active</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href=' {{ route('admin.vendor-requests.show', $request->id) }}' class='btn btn-primary'><i class='far fa-eye'></i></a>
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
