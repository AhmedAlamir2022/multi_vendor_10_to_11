@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-sm-4">

                {{-- Proile Update --}}
                <div class="col-12 col-md-12 col-lg-9">
                    <div class="card">
                        <form method="post" class="needs-validation" novalidate=""
                            action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Update Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <div class="mb-3">
                                            <img width="100px" src="{{ asset(Auth::user()->image) }}" alt="">
                                        </div>
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control"
                                            value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Proile Update --}}
                {{-- <div class="col-12 col-md-12 col-lg-9">
                    <div class="card">
                        <form method="post" class="needs-validation" novalidate=""
                            action="{{ route('admin.shop-profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Update Shop Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <div class="mb-3">
                                            <img width="100px" src="{{ asset(Auth::user()->banner) }}" alt="">
                                        </div>
                                        <label>Shop Banner</label></label>
                                        <input type="file" name="banner" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Shop Name</label>
                                        <input type="text" name="shop_name" class="form-control"
                                            value="{{ Auth::user()->shop_name }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Phone</label>
                                        <input type="tel" name="phone" class="form-control"
                                            value="{{ Auth::user()->phone }}">
                                    </div>
                                    <div class="form-group col-md-12 col-12">
                                        <div class="form-group">
                                            <label>Shop Description</label>
                                            <textarea name="description" class="form-control summernote">{{ Auth::user()->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea name="address" class="form-control">{{ Auth::user()->address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Facebook Link</label>
                                        <input type="url" name="fb_link" class="form-control"
                                            value="{{ Auth::user()->fb_link }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Twitter Link</label>
                                        <input type="url" name="tw_link" class="form-control"
                                            value="{{ Auth::user()->tw_link }}">
                                    </div>
                                    <div class="form-group col-md-12 col-12">
                                        <label>Instagram Link</label>
                                        <input type="url" name="insta_link" class="form-control"
                                            value="{{ Auth::user()->insta_link }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div> --}}


                <div class="col-12 col-md-12 col-lg-9">
                    <div class="card">
                        <form method="post" class="needs-validation" novalidate=""
                            action="{{ route('admin.password.update') }}">
                            @csrf
                            <div class="card-header">
                                <h4>Update Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Current Password</label>
                                        <input type="password" name="current_password" class="form-control">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>New Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
