@extends('admin.layouts.main')
@section('content')
    <div class="col-8 offset-3 mt-5">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <legend class="text-center">User Profile</legend>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" style="height: 56px"
                                    role="alert">
                                    <p class=""> {{ Session::get('success') }}</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @elseif (Session::has('notMatch'))
                                <div class="alert alert-danger alert-dismissible fade show" style="height: 56px"
                                    role="alert">
                                    <p class=""> {{ Session::get('notMatch') }}</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <form class="form-horizontal" method="post" action="{{ route('admin#changePassword') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Old Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="inputName"
                                            placeholder="Old Password ..." name="oldPassword">
                                        @error('oldPassword')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">New Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="inputName"
                                            placeholder="New Password ..." name="newPassword">
                                        @error('newPassword')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Confirm Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="inputName"
                                            placeholder="Confirm Password ..." name="confirmPassword">
                                        @error('confirmPassword')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-4 col-sm-8">
                                        <button type="submit" class="btn bg-dark text-white">Change Password</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
