@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Transactions</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Transactions</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Invoice ID</th>
                                            <th>Transaction ID</th>
                                            <th>Payment Method</th>
                                            <th>Amount In Base Currency</th>
                                            <th>Amount In Real Currency</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($transactions as $transaction)
                                            <?php $i++; ?>
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $transaction->order->invocie_id }}</td>
                                                <td>{{ $transaction->transaction_id }}</td>
                                                <td>{{ $transaction->payment_method }}</td>
                                                <td>{{ $transaction->amount }} {{ $transaction->order->currency_name }}
                                                </td>
                                                <td>{{ $transaction->amount_real_currency }}
                                                    {{ $transaction->amount_real_currency_name }}</td>
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
