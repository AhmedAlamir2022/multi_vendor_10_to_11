@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sliders</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.slider.create') }}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i> Create New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>banner</th>
                                            <th>title</th>
                                            <th>serial</th>
                                            <th>Status</th>
                                            <th>Updated Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($sliders as $slider)
                                            <?php $i++; ?>
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td><img width='100px' src="{{ asset($slider->banner) }}"></img></td>
                                                <td>{{ $slider->title }}</td>
                                                <td>{{ $slider->serial }}</td>
                                                <td>
                                                    @if ($slider->status == 1)
                                                        <i class="badge badge-success">Active</i>
                                                    @else
                                                        <i class="badge badge-danger">Inactive</i>
                                                    @endif
                                                </td>
                                                <td>{{ $slider->updated_at }}</td>
                                                <td>
                                                    <a href="{{ route('admin.slider.edit', $slider->id) }}"
                                                    class='btn btn-primary'><i class='far fa-edit'></i></a>
                                                    <a href="{{ route('admin.slider.destroy', $slider->id) }}" class='btn btn-danger ml-2 delete-item'><i
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
