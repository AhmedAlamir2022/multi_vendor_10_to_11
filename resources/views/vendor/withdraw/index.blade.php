@extends('vendor.layouts.master')

@section('title')
    Withdraw || {{ $settings->site_name }}
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

                        <h3><i class="far fa-user"></i> All Withdraw</h3>
                        <div class="wsus__dashboard">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="wsus__dashboard_item red" href="{{ route('vendor.orders.index') }}">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Current Balance</p>
                                        <h4 style="color:#ffff">{{ $settings->currency_icon }}{{ $currentBalance }}</h4>
                                    </a>
                                </div>

                                <div class="col-md-4">
                                    <a class="wsus__dashboard_item red" href="{{ route('vendor.orders.index') }}">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Pending Amount</p>
                                        <h4 style="color:#ffff">{{ $settings->currency_icon }}{{ $pendingAmount }}</h4>
                                    </a>
                                </div>

                                <div class="col-md-4">
                                    <a class="wsus__dashboard_item red" href="{{ route('vendor.orders.index') }}">
                                        <i class="fas fa-cart-plus"></i>
                                        <p>Total Withdraw</p>
                                        <h4 style="color:#ffff">{{ $settings->currency_icon }}{{ $totalWithdraw }}</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="create_button">
                            <a href="{{ route('vendor.withdraw.create') }}" class="btn btn-primary"><i
                                    class="fas fa-plus"></i> Create Request</a>
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
                                                            <th class="wsus__pro_name">Method</th>
                                                            <th class="wsus__pro_img">Total Amount</th>
                                                            <th class="wsus__pro_img">Withdraw Amount</th>
                                                            <th class="wsus__pro_img">Withdraw Charge</th>
                                                            <th class="wsus__pro_img">Status</th>
                                                            <th class="wsus__pro_name">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 0; ?>
                                                        @foreach ($withdraws as $withdraw)
                                                            <?php $i++; ?>
                                                            <tr class="d-flex"
                                                                style="
                                                                text-align: center;">
                                                                <td class="wsus__pro_img">{{ $i }}</td>
                                                                <td class="wsus__pro_name">{{ $withdraw->method }}</td>

                                                                <td class="wsus__pro_img">
                                                                    {{ getCurrencyIcon() . $withdraw->total_amount }}
                                                                </td>

                                                                <td class="wsus__pro_img">
                                                                    {{ getCurrencyIcon() . $withdraw->withdraw_amount }}
                                                                </td>

                                                                <td class="wsus__pro_img">
                                                                    {{ getCurrencyIcon() . $withdraw->withdraw_charge }}
                                                                </td>

                                                                <td class="wsus__pro_img">
                                                                    @if ($withdraw->status == 'pending')
                                                                        <span class='badge bg-warning'>pending</span>
                                                                    @elseif ($withdraw->status == 'paid')
                                                                        <span class='badge bg-success'>Paid</span>
                                                                    @else
                                                                        <span class='badge bg-danger'>Declined</span>
                                                                    @endif
                                                                </td>

                                                                <td class="wsus__pro_name"><a
                                                                        href='{{ route('vendor.withdraw-request.show', $withdraw->id) }}'
                                                                        class='btn btn-primary'><i
                                                                            class='far fa-eye'></i></a></td>
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
