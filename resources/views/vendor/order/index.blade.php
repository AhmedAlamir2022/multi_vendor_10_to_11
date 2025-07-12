@extends('vendor.layouts.master')

@section('title')
    Orders || {{ $settings->site_name }}
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
                        <h3><i class="far fa-user"></i> Orders</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="wsus__cart_list wishlist">
                                            <div class="table-responsive">
                                                <table>
                                                    <thead>
                                                        <tr class="d-flex">
                                                            <th class="wsus__pro_img">invocie_id</th>
                                                            <th class="wsus__pro_img">customer</th>
                                                            <th class="wsus__pro_img">date</th>
                                                            <th class="wsus__pro_img">product_qty</th>
                                                            <th class="wsus__pro_img">amount</th>
                                                            <th class="wsus__pro_img">order_status</th>
                                                            <th class="wsus__pro_img">payment_status</th>
                                                            <th class="wsus__pro_img">payment_method</th>
                                                            <th class="wsus__pro_name">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 0; ?>
                                                        @foreach ($orders as $order)
                                                            <?php $i++; ?>
                                                            <tr class="d-flex"
                                                                style="
                                                                text-align: center;">
                                                                <td class="wsus__pro_img">{{ $order->invocie_id }}</td>

                                                                <td class="wsus__pro_img">
                                                                    {{ $order->user->name }}
                                                                </td>

                                                                <td class="wsus__pro_img">
                                                                    {{ date('d-M-Y', strtotime($order->created_at)) }}
                                                                </td>

                                                                <td class="wsus__pro_img">
                                                                    {{ $order->product_qty }}
                                                                </td>

                                                                <td class="wsus__pro_img">
                                                                    {{ $order->currency_icon . $order->amount }}
                                                                </td>

                                                                <td class="wsus__pro_img">
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

                                                                <td class="wsus__pro_img">
                                                                    @if ($order->payment_status === 1)
                                                                        <span class='badge bg-success'>complete</span>
                                                                    @else
                                                                        <span class='badge bg-warning'>pending</span>
                                                                    @endif
                                                                </td>

                                                                <td class="wsus__pro_img">
                                                                    {{ $order->payment_method }}
                                                                </td>

                                                                <td class="wsus__pro_name">
                                                                    <a href="{{ route('vendor.orders.show', $order->id) }}" class='btn btn-primary'><i
                                                                            class='far fa-eye'></i></a>

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
