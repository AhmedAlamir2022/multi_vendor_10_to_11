@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Withdraw Request List</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Requests</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Vendor</th>
                                            <th>Method</th>
                                            <th>Total Amount</th>
                                            <th>Withdraw Amount</th>
                                            <th>Withdraw Charge</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($withdrawrequests as $request)
                                            <?php $i++; ?>
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $request->user->shop_name }}</td>
                                                <td>{{ $request->method }}</td>
                                                <td>{{ getCurrencyIcon() . $request->total_amount }}</td>
                                                <td>{{ getCurrencyIcon() . $request->withdraw_amount }}</td>
                                                <td>{{ getCurrencyIcon() . $request->withdraw_charge }}</td>
                                                <td>
                                                    @if ($request->status == 'pending')
                                                        <span class='badge bg-warning'>pending</span>
                                                    @elseif ($request->status == 'paid')
                                                        <span class='badge bg-success'>Paid</span>
                                                    @else
                                                        <span class='badge bg-danger'>Declined</span>
                                                    @endif
                                                </td>
                                                <td>{{ date('d M Y', strtotime($request->created_at)); }}</td>
                                                <td>
                                                    <a href='{{ route('admin.withdraw.show', $request->id) }}' class='btn btn-primary'><i class='far fa-eye'></i></a>
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
