@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Orders</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Order</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Invoice Id</th>
                                            <th>Customer</th>
                                            <th>Date</th>
                                            <th>Product Qty</th>
                                            <th>Amount</th>
                                            <th>Order Status</th>
                                            <th>Payment Status</th>
                                            <th>Payment Method</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($orders as $order)
                                            <?php $i++; ?>
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $order->invocie_id }}</td>
                                                <td>{{ $order->user->name }}</td>
                                                <td>{{ date('d-M-Y', strtotime($order->created_at)) }}</td>
                                                <td>{{ $order->product_qty }}</td>
                                                <td>{{ $order->currency_icon . $order->amount }}</td>

                                                <td>
                                                    @switch($order->order_status)
                                                        @case('pending')
                                                            <span class="badge bg-warning">pending</span>
                                                        @break

                                                        @case('processed_and_ready_to_ship')
                                                            <span class="badge bg-info">processed</span>
                                                        @break

                                                        @case('dropped_off')
                                                            <span class="badge bg-info">dropped off</span>
                                                        @break

                                                        @case('shipped')
                                                            <span class="badge bg-info">shipped</span>
                                                        @break

                                                        @case('out_for_delivery')
                                                            <span class="badge bg-primary">out for delivery</span>
                                                        @break

                                                        @case('delivered')
                                                            <span class="badge bg-success">delivered</span>
                                                        @break

                                                        @case('canceled')
                                                            <span class="badge bg-danger">canceled</span>
                                                        @break

                                                        @default
                                                            <span class="badge bg-secondary">unknown</span>
                                                    @endswitch
                                                </td>
                                                <td>
                                                    @if ($order->payment_status === 1)
                                                        <span class='badge bg-success'>complete</span>
                                                    @else
                                                        <span class='badge bg-warning'>pending</span>
                                                    @endif
                                                </td>
                                                <td>{{ $order->payment_method }}</td>
                                                <td>
                                                    <a href="{{ route('admin.order.show', $order->id) }}"
                                                        class='btn btn-primary'><i class='far fa-eye'></i></a>
                                                    <a href="{{ route('admin.order.destroy', $order->id) }}"
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
