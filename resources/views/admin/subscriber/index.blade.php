@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Subscribers</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Send Email to all subscribers</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.subscribers-send-mail') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Subject</label>
                                    <input type="text" class="form-control" name="subject">
                                </div>
                                <div class="form-group">
                                    <label for="">Message</label>
                                    <textarea name="message" class="form-control"></textarea>
                                </div>
                                <button class="btn btn-primary" style="submit">Send</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="section">

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Subscribers</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Email</th>
                                            <th>Is Verified</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($newsletters as $letter)
                                            <?php $i++; ?>
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $letter->email }}</td>
                                                <td>
                                                    @if ($letter->is_verified == 1)
                                                        <i class="badge bg-success text-light">Yes</i>
                                                    @else
                                                        <i class="badge bg-danger text-light">No</i>
                                                    @endif

                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.subscribers.destroy', $letter->id) }}"
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


